<?php

namespace Zenstruck\JWT\Tests\Signer\OpenSSL;

use Zenstruck\JWT\Tests\SignerTest;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class ECDSATest extends SignerTest
{
    public function setUp()
    {
        if (defined('HHVM_VERSION')) {
            $this->markTestSkipped();
        }

        parent::setUp();
    }
}
