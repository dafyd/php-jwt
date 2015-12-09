<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Tests\ValidatorTest;
use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator\ExpiresAtValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ExpiresAtValidatorTest extends ValidatorTest
{
    protected function createValidator()
    {
        return new ExpiresAtValidator();
    }

    protected function createValidToken()
    {
        return new Token(['exp' => time() + 100]);
    }

    public function invalidTokenProvider()
    {
        return [
            [new Token([]), 'Zenstruck\JWT\Exception\Validation\MissingClaim'],
            [new Token(['exp' => time() - 100]), 'Zenstruck\JWT\Exception\Validation\ExpiredToken'],
        ];
    }
}
