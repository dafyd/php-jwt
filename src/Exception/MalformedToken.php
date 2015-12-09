<?php

namespace Zenstruck\JWT\Exception;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class MalformedToken extends \InvalidArgumentException implements Exception
{
    private $token;

    /**
     * @param mixed           $token
     * @param string          $message
     * @param \Exception|null $previous
     */
    public function __construct($token, $message = 'Malformed token.', \Exception $previous = null)
    {
        $this->token = $token;

        parent::__construct($message, 0, $previous);
    }

    /**
     * @return mixed
     */
    public function token()
    {
        return $this->token;
    }
}
