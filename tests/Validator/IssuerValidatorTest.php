<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Validator\IssuerValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class IssuerValidatorTest extends ExpectedClaimValidatorTest
{
    protected function createValidator()
    {
        return new IssuerValidator(self::VALID_VALUE);
    }

    protected function getClaim()
    {
        return 'iss';
    }
}
