<?php

namespace Zenstruck\JWT\Tests;

use Zenstruck\JWT\Validator\AudienceValidator;
use Zenstruck\JWT\Validator\ChainValidator;
use Zenstruck\JWT\Validator\ExpectedClaimValidator;
use Zenstruck\JWT\Validator\ExpiresAtValidator;
use Zenstruck\JWT\Validator\HasClaimValidator;
use Zenstruck\JWT\Validator\IdValidator;
use Zenstruck\JWT\Validator\IssuedAtValidator;
use Zenstruck\JWT\Validator\IssuerValidator;
use Zenstruck\JWT\Validator\NotBeforeValidator;
use Zenstruck\JWT\Validator\SubjectValidator;
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
        $time = new \DateTime();

        $validator1 = new ChainValidator([
            new IssuerValidator('kevin'),
            new SubjectValidator('zenstruck\jwt'),
            new AudienceValidator('php community'),
            new ExpiresAtValidator($time),
            new NotBeforeValidator($time),
            new IssuedAtValidator($time->getTimestamp()),
            new IdValidator('foo'),
            new HasClaimValidator('custom1'),
            new ExpectedClaimValidator('custom1', 'foo'),
        ]);

        $validator2 = (new ValidatorBuilder())
            ->issuer('kevin')
            ->subject('zenstruck\jwt')
            ->audience('php community')
            ->expiresAt($time)
            ->notBefore($time)
            ->issuedAt($time->getTimestamp())
            ->id('foo')
            ->has('custom1')
            ->expect('custom1', 'foo')
            ->create();

        $this->assertInstanceOf('Zenstruck\JWT\Validator\ChainValidator', $validator2);
        $this->assertEquals($validator1, $validator2);
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
