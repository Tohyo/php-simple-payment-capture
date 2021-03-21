<?php

namespace SimplePaymentCapture\PaymentProvider\Braintree;

use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\Exception\InvalidProviderConfiguration;
use SimplePaymentCapture\PaymentProvider\PaymentProviderConfigurationValidatorInterface;

class BraintreeConfigurationValidator implements PaymentProviderConfigurationValidatorInterface
{
    /**
     * @param string[] $config
     */
    public function validate(array $config): void
    {
        if (!isset($config['environment'])
            || !isset($config['merchantId'])
            || !isset($config['publicKey'])
            || !isset($config['privateKey'])
        ) {
            throw new InvalidProviderConfiguration(
                sprintf('Wrong configuration for provider: %s', PaymentProviderEnum::BRAINTREE)
            );
        }
    }
}