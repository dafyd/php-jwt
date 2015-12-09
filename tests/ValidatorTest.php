<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function validates_valid_token()
    {
        $this->assertInstanceOf('Zenstruck\JWT\Token', $this->createValidToken()->validate($this->createValidator()));
    }

    /**
     * @test
     *
     * @dataProvider invalidTokenProvider
     */
    public function throws_exception_when_invalid(Token $invalidToken, $expectedException)
    {
        $this->setExpectedException($expectedException);

        $invalidToken->validate($this->createValidator());
    }

    /**
     * @return Validator
     */
    abstract protected function createValidator();

    /**
     * @return Token
     */
    abstract protected function createValidToken();

    abstract public function invalidTokenProvider();
}
