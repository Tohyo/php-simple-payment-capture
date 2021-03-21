<?php

namespace SimplePaymentCapture\Exception;

use \Exception;

class InvalidProviderConfiguration extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}