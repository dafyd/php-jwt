<?php

namespace Zenstruck\JWT\Tests\Signer;

use Zenstruck\JWT\Signer\HMAC\HS256;
use Zenstruck\JWT\Signer\None;
use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class NoneTest extends SignerTest
{
    protected function createSigner()
    {
        return new None();
    }

    protected function createAlternateAlgorithmSigner()
    {
        return new HS256('1234');
    }

    protected function createSignerKey()
    {
        return null;
    }

    protected function createVerifierKey()
    {
        return null;
    }

    protected function createAlternateVerifierKey()
    {
        $this->markTestSkipped('Skipped for Zenstruck\JWT\Signer\None.');
    }
}
