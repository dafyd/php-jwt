<?php

namespace Zenstruck\JWT\Validator;

use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class IssuerValidator extends ExpectedClaimValidator
{
    /**
     * {@inheritdoc}
     */
    protected function claim()
    {
        return Token::CLAIM_ISS;
    }
}
