<?php

namespace SimplePaymentCapture\PaymentProvider;

use SimplePaymentCapture\Dto\PaymentDto;
use SimplePaymentCapture\Dto\PaymentResponseDto;

interface PaymentProviderInterface
{
    /**
     * @param string[] $config
     */
    public function validateConfiguration(
        PaymentProviderConfigurationValidatorInterface $validator, 
        array $config
    ): self;

    public function capture(PaymentDto $paymentDto): PaymentResponseDto;
}