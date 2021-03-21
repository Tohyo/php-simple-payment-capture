<?php

namespace SimplePaymentCapture\Factory;

use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\PaymentProvider\PaymentProviderConfigurationValidatorInterface;

class PaymentProviderValidatorFactory
{
    /**
     * @throws ProviderNotFoundException
     */
    public static function create(string $providerName): PaymentProviderConfigurationValidatorInterface
    {
        PaymentProviderEnum::isProviderAvailable($providerName);

        $validatorClassName = 'SimplePaymentCapture\\PaymentProvider\\' . ucfirst($providerName) . '\\' . ucfirst($providerName) . 'ConfigurationValidator';

        return new $validatorClassName;
    }
}