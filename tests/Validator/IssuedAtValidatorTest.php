<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Validator\IssuedAtValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class IssuedAtValidatorTest extends ExpectedClaimValidatorTest
{
    protected function createValidator()
    {
        return new IssuedAtValidator(self::VALID_VALUE);
    }

    protected function getClaim()
    {
        return 'iat';
    }
}
