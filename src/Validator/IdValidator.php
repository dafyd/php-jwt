<?php

namespace Zenstruck\JWT\Validator;

use Zenstruck\JWT\Token;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class IdValidator extends ExpectedClaimValidator
{
    /**
     * {@inheritdoc}
     */
    protected function claim()
    {
        return Token::CLAIM_JTI;
    }
}
