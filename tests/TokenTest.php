<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class TokenTest extends \PHPUnit_Framework_TestCase
{
    private $tokenString = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.';
    private $headers = ['alg' => 'HS256', 'typ' => 'JWT'];
    private $claims = ['sub' => '1234567890', 'name' => 'John Doe', 'admin' => true];

    /** @var Token */
    private $token;

    public function setUp()
    {
        parent::setUp();

        $this->token = Token::fromString($this->tokenString);
    }

    /**
     * @test
     */
    public function can_create_from_string()
    {
        $this->assertSame($this->headers, $this->token->headers());
        $this->assertSame($this->claims, $this->token->claims());
    }

    /**
     * @test
     */
    public function can_convert_to_string()
    {
        $this->assertSame($this->tokenString, (string) $this->token);
    }

    /**
     * @test
     */
    public function can_get_headers()
    {
        $this->assertSame('HS256', $this->token->algorithm());
        $this->assertSame('JWT', $this->token->getHeader('typ'));
    }

    /**
     * @test
     */
    public function can_get_default_header()
    {
        $this->assertSame('bar', $this->token->getHeader('foo', 'bar'));
    }

    /**
     * @test
     */
    public function can_get_claims()
    {
        $this->assertSame(true, $this->token->get('admin'));
        $this->assertSame('1234567890', $this->token->get('sub'));

        $token = new Token([
            'iss' => 'kevin',
            'sub' => 'zenstruck\jwt',
            'aud' => 'php community',
            'jti' => 'fklhsfkl',
        ]);

        $this->assertSame('kevin', $token->issuer());
        $this->assertSame('zenstruck\jwt', $token->subject());
        $this->assertSame('php community', $token->audience());
        $this->assertSame('fklhsfkl', $token->id());
    }

    /**
     * @test
     */
    public function can_get_default_claim()
    {
        $this->assertSame('bar', $this->token->get('foo', 'bar'));
    }

    /**
     * @test
     */
    public function can_get_issued_at()
    {
        $this->assertNull($this->token->issuedAt());

        $time = \DateTime::createFromFormat('U', '1449464400');
        $this->assertEquals($time, (new Token(['iat' => $time->getTimestamp()]))->issuedAt());
    }

    /**
     * @test
     */
    public function can_get_not_before()
    {
        $this->assertNull($this->token->notBefore());

        $time = \DateTime::createFromFormat('U', '1449464400');
        $this->assertEquals($time, (new Token(['nbf' => $time->getTimestamp()]))->notBefore());
    }

    /**
     * @test
     */
    public function can_check_if_acceptable()
    {
        $this->assertTrue($this->token->isAcceptable());
        $this->assertTrue((new Token(['nbf' => time() - 5]))->isAcceptable());
        $this->assertFalse((new Token(['nbf' => time() + 5]))->isAcceptable());
    }

    /**
     * @test
     */
    public function can_get_expired_at()
    {
        $this->assertNull($this->token->expiresAt());
        $this->assertFalse($this->token->isExpired());

        $time = \DateTime::createFromFormat('U', '1449464400');
        $token = new Token(['exp' => $time->getTimestamp()]);
        $this->assertEquals($time, $token->expiresAt());
        $this->assertTrue($token->isExpired());
    }

    /**
     * @test
     *
     * @dataProvider malformedTokenProvider
     *
     * @expectedException \Zenstruck\JWT\Exception\MalformedToken
     */
    public function exception_on_malformed_token($token)
    {
        Token::fromString($token);
    }

    public static function malformedTokenProvider()
    {
        return [
            [new \stdClass()],
            [[]],
            ['foo'],
            ['foo.bar.baz'],
            [sprintf('%s.%s.%s', base64_encode(json_encode('foo')), base64_encode(json_encode('bar')), base64_encode(json_encode('baz')))],
        ];
    }
}
