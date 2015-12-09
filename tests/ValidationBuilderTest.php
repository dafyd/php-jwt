<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\ValidatorBuilder;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ValidationBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function creates_chain_validator()
    {
        $validator = (new ValidatorBuilder())
            ->issuer('kevin')
            ->subject('zenstruck\jwt')
            ->audience('php community')
            ->expiresAt()
            ->notBefore()
            ->issuedAt(time())
            ->id('foo')
            ->create();

        $this->assertInstanceOf('Zenstruck\JWT\Validator\ChainValidator', $validator);
    }

    /**
     * @test
     */
    public function empty_builder_creates_null_validator()
    {
        $this->assertInstanceOf('Zenstruck\JWT\Validator\NullValidator', (new ValidatorBuilder())->create());
    }

    /**
     * @test
     */
    public function returns_single_validator()
    {
        $this->assertInstanceOf('Zenstruck\JWT\Validator\ExpiresAtValidator', (new ValidatorBuilder())->expiresAt()->create());
    }
}
