<?php

use SimplePaymentCapture\Exception\InvalidProviderConfiguration;
use SimplePaymentCapture\Exception\ProviderNotFoundException;
use SimplePaymentCapture\PaymentClient;

it('should throw a exception if the provider is not supported', function(string $providerName) {
    (new PaymentClient([]))
        ->processPayment(getTestPaymentDto($providerName));
})
    ->with([
        'paypal',
        'payon'
    ])
    ->throws(ProviderNotFoundException::class);

it('should throw a exception if the configuration is invalid', function(string $providerName) {
    (new PaymentClient([]))
        ->processPayment(getTestPaymentDto($providerName));
})
    ->with([
        'stripe',
        'braintree'
    ])
    ->throws(InvalidProviderConfiguration::class);