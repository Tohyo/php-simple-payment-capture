<?php

namespace SimplePaymentCapture\Dto;

class PaymentDto
{
    private string $providerName;

    private float $amount;

    private string $currency;

    private string $cardName;

    private string $cardNumber;

    private string $cvc;

    private string $expiryMonth;

    private string $expiryYear;

    public function __construct(
        string $providerName,
        float $amount,
        string $currency,
        string $cardName,
        string $cardNumber,
        string $cvc,
        string $expiryMonth,
        string $expiryYear
    ) {
        $this->providerName = $providerName;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->cardName = $cardName;
        $this->cardNumber = $cardNumber;
        $this->cvc = $cvc;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getCardName(): string
    {
        return $this->cardName;
    }
    
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function getCvc(): string
    {
        return $this->cvc;
    }

    public function getExpiryMonth(): string
    {
        return $this->expiryMonth;
    }

    public function getExpiryYear(): string
    {
        return $this->expiryYear;
    }
}