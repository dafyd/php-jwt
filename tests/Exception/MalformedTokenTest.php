<?php

namespace Zenstruck\JWT\Tests\Exception;

use Zenstruck\JWT\Exception\MalformedToken;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class MalformedTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function can_access_token()
    {
        $this->assertSame('foo', (new MalformedToken('foo'))->token());
    }
}
