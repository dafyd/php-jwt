<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL\ECDSA;

use Zenstruck\JWT\Signer\OpenSSL\ECDSA\ES384;
use Zenstruck\JWT\Tests\Signer\OpenSSL\ECDSATest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ES384Test extends ECDSATest
{
    protected function createSigner()
    {
        return new ES384();
    }

    protected function createSignerKey()
    {
        return $this->getFixtureDir().'/private.es384.key';
    }

    protected function createVerifierKey()
    {
        return $this->getFixtureDir().'/public.es384.key';
    }

    protected function createAlternateVerifierKey()
    {
        return $this->getFixtureDir().'/public.es256.key';
    }
}
