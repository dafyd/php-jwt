<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\TokenBuilder;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class TokenBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_build_token()
    {
        $time = new \DateTime();
        $timestamp = $time->getTimestamp();

        $token = (new TokenBuilder())
            ->issuer('kevin')
            ->subject('zenstruck\jwt')
            ->audience('php community')
            ->expiresAt($time)
            ->notBefore($time)
            ->issuedAt($time)
            ->id('foo')
            ->set('foo', 'bar')
            ->create()
        ;

        $this->assertSame(['typ' => 'JWT'], $token->headers());
        $this->assertSame([
            'iss' => 'kevin',
            'sub' => 'zenstruck\jwt',
            'aud' => 'php community',
            'exp' => $timestamp,
            'nbf' => $timestamp,
            'iat' => $timestamp,
            'jti' => 'foo',
            'foo' => 'bar',
        ], $token->claims());
    }

    /**
     * @test
     */
    public function can_build_with_default_iat()
    {
        $token = (new TokenBuilder())->issuedAt()->create();

        $this->assertEquals(time(), $token->issuedAt()->getTimestamp(), '', 1);
    }
}
