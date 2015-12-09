<?php

namespace Zenstruck\JWT\Validator;

use Zenstruck\JWT\Exception\Validation\ClaimMismatch;
use Zenstruck\JWT\Exception\Validation\MissingClaim;
use Zenstruck\JWT\Token;
use Zenstruck\JWT\Validator;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class ExpectedClaimValidator implements Validator
{
    private $expected;

    /**
     * @param mixed $expected
     */
    public function __construct($expected)
    {
        $this->expected = $expected;
    }

    /**
     * {@inheritdoc}
     */
    public function validate(Token $token)
    {
        $claim = $this->claim();
        $actual = $token->get($claim);

        if (null === $actual) {
            throw new MissingClaim($claim, $token);
        }

        if ($this->expected !== $actual) {
            throw new ClaimMismatch($claim, $actual, $this->expected, $token);
        }
    }

    /**
     * @return string
     */
    abstract protected function claim();
}
