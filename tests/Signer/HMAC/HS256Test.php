<?php

namespace Zenstruck\JWT\Tests\Signer\HMAC;

use Zenstruck\JWT\Signer\HMAC\HS256;
use Zenstruck\JWT\Tests\Signer\HMACTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class HS256Test extends HMACTest
{
    protected function createSigner()
    {
        return new HS256();
    }
}
