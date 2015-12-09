<?php

namespace Zenstruck\JWT\Tests\Validator;

use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator\NullValidator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class NullValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bypasses_validation()
    {
        $token = new Token([]);

        $this->assertSame($token, $token->validate(new NullValidator()));
    }
}
