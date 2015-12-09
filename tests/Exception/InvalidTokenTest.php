<?php

namespace Zenstruck\JWT\Tests\Exception;

use Zenstruck\JWT\Exception\InvalidToken;
use Zenstruck\JWT\Exception\UnverifiedToken;
use Zenstruck\JWT\Exception\Validation\ClaimMismatch;
use Zenstruck\JWT\Exception\Validation\ExpiredToken;
use Zenstruck\JWT\Exception\Validation\MissingClaim;
use Zenstruck\JWT\Exception\Validation\UnacceptableToken;
use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class InvalidTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider exceptionProvider
     */
    public function can_access_propeties(InvalidToken $exception, $expectedMessage)
    {
        $this->assertInstanceOf('Zenstruck\JWT\Token', $exception->token());
        $this->assertSame($expectedMessage, $exception->getMessage());
    }

    public function exceptionProvider()
    {
        return [
            [new UnverifiedToken(new Token([])), 'Unverified token.'],
            [new ClaimMismatch('iss', 'foo', 'kevin', new Token([])), 'Token claim "iss" should be "kevin", got "foo".'],
            [new MissingClaim('iss', new Token([])), 'Token missing claim "iss".'],
            [new ExpiredToken(new Token([])), 'Expired token.'],
            [new UnacceptableToken(new Token([])), 'Unacceptable token.'],
        ];
    }
}
