<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\Signer;
use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class SignerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_sign_and_verify()
    {
        $token = new Token(['foo' => 'bar']);
        $signer = $this->createSigner();
        $token->sign($signer, $this->createSignerKey());
        $this->assertSame($signer->name(), $token->algorithm());

        $newToken = Token::fromString((string) $token);
        $this->assertEquals($token, $newToken);
        $this->assertSame((string) $token, (string) $newToken);
        $newToken->verify($signer, $this->createVerifierKey());
    }

    /**
     * @test
     *
     * @expectedException \Zenstruck\JWT\Exception\InvalidToken
     */
    public function exception_when_algorithm_does_not_match()
    {
        $token = new Token(['foo' => 'bar']);
        $token->sign($this->createAlternateAlgorithmSigner(), $this->createSignerKey());
        $token->verify($this->createSigner(), $this->createVerifierKey());
    }

    /**
     * @test
     *
     * @expectedException \Zenstruck\JWT\Exception\InvalidToken
     */
    public function exception_when_token_cannot_be_verified()
    {
        $token = new Token(['foo' => 'bar']);
        $signer = $this->createSigner();
        $token->sign($signer, $this->createSignerKey());
        $token->verify($signer, $this->createAlternateVerifierKey());
    }

    /**
     * @return Signer
     */
    abstract protected function createSigner();

    abstract protected function createSignerKey();

    abstract protected function createVerifierKey();

    abstract protected function createAlternateVerifierKey();

    /**
     * @return Signer
     */
    protected function createAlternateAlgorithmSigner()
    {
        return new Signer\None();
    }

    protected function getFixtureDir()
    {
        return __DIR__.'/Fixtures';
    }
}
