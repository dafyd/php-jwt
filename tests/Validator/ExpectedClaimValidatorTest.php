<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Tests\ValidatorTest;
use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class ExpectedClaimValidatorTest extends ValidatorTest
{
    const VALID_VALUE = 'foo';

    /**
     * @return Token
     */
    protected function createValidToken()
    {
        return new Token([$this->getClaim() => self::VALID_VALUE]);
    }

    public function invalidTokenProvider()
    {
        return [
            [new Token([]), 'Zenstruck\JWT\Exception\Validation\MissingClaim'],
            [new Token([$this->getClaim() => 'bar']), 'Zenstruck\JWT\Exception\Validation\ClaimMismatch'],
        ];
    }

    abstract protected function getClaim();
}
