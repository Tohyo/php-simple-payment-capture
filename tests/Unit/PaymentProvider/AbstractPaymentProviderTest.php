<?php

use SimplePaymentCapture\Dto\PaymentDto;
use SimplePaymentCapture\Dto\PaymentResponseDto;
use SimplePaymentCapture\PaymentProvider\AbstractPaymentProvider;
use SimplePaymentCapture\PaymentProvider\PaymentProviderConfigurationValidatorInterface;
use SimplePaymentCapture\PaymentProvider\PaymentProviderInterface;

it('should return a instance if payment provider if the provider is supported', function() {
    $abstract = new class extends AbstractPaymentProvider {
        public function capture(PaymentDto $paymentDto): PaymentResponseDto
        {
            return new PaymentResponseDto('', '', '');
        }
    };

    $this->assertInstanceOf(
        PaymentProviderInterface::class, 
        $abstract->validateConfiguration(
            new class implements PaymentProviderConfigurationValidatorInterface {
                public function validate(array $config): void
                {}
            },
            []
        )
    );
});