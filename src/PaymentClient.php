<?php

namespace SimplePaymentCapture;

use SimplePaymentCapture\Dto\PaymentDto;
use SimplePaymentCapture\Dto\PaymentResponseDto;
use SimplePaymentCapture\Factory\PaymentProviderFactory;
use SimplePaymentCapture\Factory\PaymentProviderValidatorFactory;

class PaymentClient
{
    /**
     * @var array[] $config
     */
    private array $config;

    /**
     * @param array[] $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @throws InvalidProviderConfiguration
     * @throws ProviderNotFoundException
     */
    public function processPayment(PaymentDto $paymentDto): PaymentResponseDto
    {
        return (PaymentProviderFactory::create($paymentDto->getProviderName()))
            ->validateConfiguration(
                PaymentProviderValidatorFactory::create($paymentDto->getProviderName()),
                $this->config[$paymentDto->getProviderName()] ?? []
            )
            ->capture($paymentDto);
    }
}
