# Simple Payment Capture

The simple payment capture package helps to integrate the credit card payment flow from multiple payment provider.

Payment provider currently supported:  
  * Stripe
  * Braintree(Paypal)  
    

# Installation

Install with composer:

```
compose require tohyo/php-simple-payment-capture
```

# Usage

Start by including the `autoload.php` file
```
require_once('/path/to/php-simple-payment-capture/vendor/autoload.php');
```

Then instantiate the `PaymentClient` class with the configuration data from the payment provider that you want to use, for instance with Stripe:

```
use SimplePaymentCapture\PaymentClient;

$paymentClient = new PaymentClient([
    'stripe' => [
      'private_key' => 'sk_...'
    ],
  ]);
```

Once you have the `PaymentClient` instance ready you can process a payment like this:

```
$paymentClient->processPayment(
    new PaymentDto(
        providerName,          // stripe
        amout,                 // 10
        currency,              // eur
        cardHolderName,        // Kevin
        cardNumber,            // 4242424242424242
        cvc,                   // 111
        expiryMonth,           // 06
        expiryYear             // 21
    )
);
```