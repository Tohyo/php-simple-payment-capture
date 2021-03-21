<?php

namespace SimplePaymentCapture\PaymentProvider;

abstract class AbstractPaymentProvider implements PaymentProviderInterface
{
    /** @var string[] */
    protected array $config;

    /**
     * @param string[] $config
     * 
     * @throws InvalidProviderConfiguration
     */
    public function validateConfiguration(
        PaymentProviderConfigurationValidatorInterface $validator,
        array $config
    ): PaymentProviderInterface {
        $validator->validate($config);
        $this->config = $config;

        return $this;
    }
}