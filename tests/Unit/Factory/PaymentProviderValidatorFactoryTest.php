<?php

use SimplePaymentCapture\Exception\ProviderNotFoundException;
use SimplePaymentCapture\Factory\PaymentProviderValidatorFactory;
use SimplePaymentCapture\PaymentProvider\PaymentProviderConfigurationValidatorInterface;

it('should throw a exception if the provider is not supported', function(string $providerName) {
    PaymentProviderValidatorFactory::create($providerName);
})
    ->with([
        'paypal',
        'payon',
    ])
    ->throws(ProviderNotFoundException::class);

it('should return a instance of payment configuration validator when the provider is supported', function(string $providerName) {
    $this->assertInstanceOf(PaymentProviderConfigurationValidatorInterface::class, PaymentProviderValidatorFactory::create($providerName));
})
    ->with([
        'stripe',
        'braintree',
    ]);