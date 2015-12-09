<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Tests\ValidatorTest;
use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator\AudienceValidator;
use Zenstruck\JWT\Validator\ChainValidator;
use Zenstruck\JWT\Validator\ExpiresAtValidator;
use Zenstruck\JWT\Validator\IssuerValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ChainValidatorTest extends ValidatorTest
{
    protected function createValidator()
    {
        return new ChainValidator([
            new IssuerValidator('kevin'),
            new ExpiresAtValidator(),
            new AudienceValidator('php community'),
        ]);
    }

    protected function createValidToken()
    {
        return new Token(['iss' => 'kevin', 'exp' => time() + 100, 'aud' => 'php community']);
    }

    public function invalidTokenProvider()
    {
        return [
            [new Token([]), 'Zenstruck\JWT\Exception\Validation\MissingClaim'],
            [new Token(['exp' => time() - 100]), 'Zenstruck\JWT\Exception\Validation\MissingClaim'],
            [new Token(['iss' => 'kevin', 'exp' => time() - 100]), 'Zenstruck\JWT\Exception\Validation\ExpiredToken'],
        ];
    }
}
