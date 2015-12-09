<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Tests\ValidatorTest;
use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator\NotBeforeValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class NotBeforeValidatorTest extends ValidatorTest
{
    protected function createValidator()
    {
        return new NotBeforeValidator();
    }

    protected function createValidToken()
    {
        return new Token(['nbf' => time() - 100]);
    }

    public function invalidTokenProvider()
    {
        return [
            [new Token([]), 'Zenstruck\JWT\Exception\Validation\MissingClaim'],
            [new Token(['nbf' => time() + 100]), 'Zenstruck\JWT\Exception\Validation\UnacceptableToken'],
        ];
    }
}
