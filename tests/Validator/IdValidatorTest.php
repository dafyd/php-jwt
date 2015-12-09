<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Validator\IdValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class IdValidatorTest extends ExpectedClaimValidatorTest
{
    protected function createValidator()
    {
        return new IdValidator(self::VALID_VALUE);
    }

    protected function getClaim()
    {
        return 'jti';
    }
}
