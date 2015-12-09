<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Validator\SubjectValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class SubjectValidatorTest extends ExpectedClaimValidatorTest
{
    protected function createValidator()
    {
        return new SubjectValidator(self::VALID_VALUE);
    }

    protected function getClaim()
    {
        return 'sub';
    }
}
