<?php

namespace SimplePaymentCapture\PaymentProvider\Braintree;

use SimplePaymentCapture\Dto\PaymentDto;
use Braintree\Gateway;
use Braintree\Result\Successful;
use SimplePaymentCapture\Dto\PaymentResponseDto;
use SimplePaymentCapture\Enum\PaymentProviderEnum;
use SimplePaymentCapture\PaymentProvider\AbstractPaymentProvider;

class Braintree extends AbstractPaymentProvider
{
    public function capture(PaymentDto $paymentDto): PaymentResponseDto
    {
        $braintree = new Gateway($this->config);

        /** @var Successful */
        $braintreeResponse = $braintree->transaction()->sale([
            'amount' => $paymentDto->getAmount(),
            'creditCard' => [
                'cardholderName' => $paymentDto->getCardName(),
                'number' => $paymentDto->getCardNumber(),
                'expirationDate' => sprintf('%s/%s', $paymentDto->getExpiryMonth(), $paymentDto->getExpiryYear()),
                'cvv' => $paymentDto->getCvc()
            ],
            'customer' => [
                'lastName' => $paymentDto->getCardName(),
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        return new PaymentResponseDto(
            $braintreeResponse->transaction->id,
            $braintreeResponse->transaction->status,
            PaymentProviderEnum::BRAINTREE
        );
    }
}
