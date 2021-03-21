<?php

namespace SimplePaymentCapture\PaymentProvider;

interface PaymentProviderConfigurationValidatorInterface
{
    /** @param string[] $config */
    public function validate(array $config): void;
}