<?php

namespace Zenstruck\JWT\Tests\Signer\HMAC;

use Zenstruck\JWT\Signer\HMAC\HS512;
use Zenstruck\JWT\Tests\Signer\HMACTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class HS512Test extends HMACTest
{
    protected function createSigner()
    {
        return new HS512('1234');
    }
}
