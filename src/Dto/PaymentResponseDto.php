<?php

namespace SimplePaymentCapture\Dto;

class PaymentResponseDto
{
    private string $id;

    private string $status;

    private string $providerName;

    public function __construct(
        string $id,
        string $status, 
        string $providerName
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->providerName = $providerName;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getProviderName(): string
    {
        return $this->providerName;
    }
}
