<?php

namespace SimplePaymentCapture\PaymentProvider\Stripe;

use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\Exception\InvalidProviderConfiguration;
use SimplePaymentCapture\PaymentProvider\PaymentProviderConfigurationValidatorInterface;

class StripeConfigurationValidator implements PaymentProviderConfigurationValidatorInterface
{
    /**
     * @param string[] $config
     * 
     * @throws InvalidProviderConfiguration
     */
    public function validate(array $config): void
    {
        if (!isset($config['private_key'])) {
            throw new InvalidProviderConfiguration(
                sprintf('Wrong configuration for provider: %s', PaymentProviderEnum::STRIPE)
            );
        }
    }
}