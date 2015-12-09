<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL\RSA;

use Zenstruck\JWT\Signer\OpenSSL\RSA\RS256;
use Zenstruck\JWT\Tests\Signer\OpenSSL\RSATest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class RS256Test extends RSATest
{
    protected function createSigner()
    {
        return new RS256();
    }
}
