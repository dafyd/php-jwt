<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL;

use Zenstruck\JWT\Signer\OpenSSL\Keychain;
use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class RSATest extends SignerTest
{
    private $keychain;

    public function setUp()
    {
        $fixtureDir = $this->getFixtureDir();

        $this->keychain = new Keychain(
            $fixtureDir.'/public.rsa.key',
            $fixtureDir.'/private.rsa.key',
            'tests'
        );

        parent::setUp();
    }

    protected function createAlternateVerifierKey()
    {
        return $this->getFixtureDir().'/public.rsa-alt.key';
    }

    protected function createSignerKey()
    {
        return $this->keychain;
    }

    protected function createVerifierKey()
    {
        return $this->keychain;
    }
}
