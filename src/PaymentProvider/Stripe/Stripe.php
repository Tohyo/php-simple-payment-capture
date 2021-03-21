<?php

namespace SimplePaymentCapture\PaymentProvider\Stripe;

use SimplePaymentCapture\Dto\PaymentDto;
use SimplePaymentCapture\Dto\PaymentResponseDto;
use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\PaymentProvider\AbstractPaymentProvider;
use Stripe\StripeClient;

class Stripe extends AbstractPaymentProvider
{
    private StripeClient $stripeClient;

    public function capture(PaymentDto $paymentDto): PaymentResponseDto
    {
        $this->stripeClient = new StripeClient($this->config['private_key']);

        $token = $this->stripeClient->tokens->create([
            'card' => [
                'number' => $paymentDto->getCardNumber(),
                'exp_month' => $paymentDto->getExpiryMonth(),
                'exp_year' => $paymentDto->getExpiryYear(),
                'cvc' => $paymentDto->getCvc(),
            ]
        ])['id'];

        $stripeResponse = $this->stripeClient->charges->create([
            'amount' => $this->formatAmpount($paymentDto->getAmount()),
            'currency' => $paymentDto->getCurrency(),
            'source' => $token,
        ]);

        return new PaymentResponseDto(
            $stripeResponse->id,
            $stripeResponse->status,
            PaymentProviderEnum::STRIPE
        );
    }

    private function formatAmpount(float $amount): float
    {
        return $amount * 100;
    }
}
