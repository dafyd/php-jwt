<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL\ECDSA;

use Zenstruck\JWT\Signer\OpenSSL\ECDSA\ES512;
use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ES512Test extends SignerTest
{
    protected function createSigner()
    {
        return new ES512();
    }

    protected function createSignerKey()
    {
        return $this->getFixtureDir().'/private.es512.key';
    }

    protected function createVerifierKey()
    {
        return $this->getFixtureDir().'/public.es512.key';
    }

    protected function createAlternateVerifierKey()
    {
        return $this->getFixtureDir().'/public.es256.key';
    }
}
