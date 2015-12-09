<?php

namespace Zenstruck\JWT\Tests\Signer;

use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class HMACTest extends SignerTest
{
    protected function createSignerKey()
    {
        return '1234';
    }

    protected function createVerifierKey()
    {
        return '1234';
    }

    protected function createAlternateVerifierKey()
    {
        return '4321';
    }
}
