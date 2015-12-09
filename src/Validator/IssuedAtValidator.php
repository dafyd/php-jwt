<?php

namespace Zenstruck\JWT\Validator;

use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class IssuedAtValidator extends ExpectedClaimValidator
{
    /**
     * {@inheritdoc}
     */
    protected function claim()
    {
        return Token::CLAIM_IAT;
    }
}
