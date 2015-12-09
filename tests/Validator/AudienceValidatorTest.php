<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Validator\AudienceValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class AudienceValidatorTest extends ExpectedClaimValidatorTest
{
    protected function createValidator()
    {
        return new AudienceValidator(self::VALID_VALUE);
    }

    protected function getClaim()
    {
        return 'aud';
    }
}
