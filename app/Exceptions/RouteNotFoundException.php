<?php

namespace App\Exceptions;

use Exception;

class RouteNotFoundException extends Exception
{
    public function __construct(string $message, int $code = 404)
    {
        parent::__construct($message, $code);
    }
}