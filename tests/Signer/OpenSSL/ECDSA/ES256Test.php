<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL\ECDSA;

use Zenstruck\JWT\Signer\OpenSSL\ECDSA\ES256;
use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ES256Test extends SignerTest
{
    protected function createSigner()
    {
        return new ES256();
    }

    protected function createSignerKey()
    {
        return $this->getFixtureDir().'/private.es256.key';
    }

    protected function createVerifierKey()
    {
        return $this->getFixtureDir().'/public.es256.key';
    }

    protected function createAlternateVerifierKey()
    {
        return $this->getFixtureDir().'/public.es384.key';
    }
}
