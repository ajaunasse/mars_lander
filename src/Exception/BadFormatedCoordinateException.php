<?php
declare(strict_types=1);

namespace App\Exception;

use Throwable;

class BadFormatedCoordinateException extends \RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
