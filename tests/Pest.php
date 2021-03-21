<?php

use SimplePaymentCapture\Dto\PaymentDto;

function getTestPaymentDto(string $providerName): PaymentDto
{
    return new PaymentDto(
        $providerName,
        10,
        'eur',
        'Kevin Baujard',
        '4242424242424242',
        '111',
        '06',
        '21'
    );
}