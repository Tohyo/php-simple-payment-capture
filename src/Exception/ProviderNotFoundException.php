<?php

namespace SimplePaymentCapture\Exception;

use Exception;

class ProviderNotFoundException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}