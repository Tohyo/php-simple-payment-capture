<?php

namespace SimplePaymentCapture\Enum;

use SimplePaymentCapture\Exception\ProviderNotFoundException;

class PaymentProviderEnum
{
    public const STRIPE = 'stripe';
    public const BRAINTREE = 'braintree';

    private const PROVIDER_AVAILABLE = [
        self::STRIPE,
        self::BRAINTREE
    ];


    /**
     * @throws ProviderNotFoundException
     */
    public static function isProviderAvailable(string $providerName): void
    {
        if (!in_array($providerName, self::PROVIDER_AVAILABLE)) {
            throw new ProviderNotFoundException(
                sprintf('The %s provider is not currently supported', $providerName)
            );
        }
    }
}
