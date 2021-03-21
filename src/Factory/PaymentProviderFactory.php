<?php

namespace SimplePaymentCapture\Factory;

use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\PaymentProvider\PaymentProviderInterface;

class PaymentProviderFactory
{
    /**
     * @throws ProviderNotFoundException
     */
    public static function create(string $providerName): PaymentProviderInterface
    {
        PaymentProviderEnum::isProviderAvailable($providerName);

        $providerClassName = 'SimplePaymentCapture\\PaymentProvider\\' . ucfirst($providerName) . '\\' . ucfirst($providerName);
        
        return new $providerClassName;
    }