<?php

use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\Exception\ProviderNotFoundException;

it('should throw a exception if the provider is not supported', function (string $providerName) {
    PaymentProviderEnum::isProviderAvailable($providerName);
})
    ->with([
        'paypal',
        'payon',
    ])
    ->throws(ProviderNotFoundException::class);

it('should not throw a exception if the provider is supported', function (string $providerName) {
    $this->assertNull(PaymentProviderEnum::isProviderAvailable($providerName));
})
    ->with([
        'stripe',
        'braintree',
    ]);