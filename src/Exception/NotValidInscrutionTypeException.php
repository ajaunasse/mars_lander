<?php

namespace App\Exception;

use Throwable;

class NotValidInscrutionTypeException extends \RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
