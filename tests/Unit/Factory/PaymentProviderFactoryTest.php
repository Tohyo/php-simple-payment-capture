<?php

use SimplePaymentCapture\Exception\ProviderNotFoundException;
use SimplePaymentCapture\Factory\PaymentProviderFactory;
use SimplePaymentCapture\PaymentProvider\PaymentProviderInterface;

it('should throw a exception if the provider is not supported', function(string $providerName) {
    PaymentProviderFactory::create($providerName);
})
    ->with([
        'paypal',
        'payon',
    ])
    ->throws(ProviderNotFoundException::class);

it('create a instance of payment provider', function(string $providerName) {
    $this->assertInstanceOf(PaymentProviderInterface::class, PaymentProviderFactory::create($providerName));
})
    ->with([
        'stripe',
        'braintree'
    ]);