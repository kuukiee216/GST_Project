<?php
require_once '../vendor/autoload.php';
require_once '../PHPFiles/Essentials/db_config_local.php';

// Include the Stripe PHP library
require_once '../vendor/stripe/stripe-php/init.php';

// Initialize Stripe with your API keys
\Stripe\Stripe::setApiKey('sk_test_51PFDxmCkPh52z8OSVcAFZKSDs23OkoXC9AFfqsGbusDNjARsYG7zhiJkBXXL9HsZjPgK7fFUyM5SYU9EmiY4JTfv00zsiiKvtX');

// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

// Verify and parse the event from Stripe
$signature_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? null;
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent(
        $input,
        $signature_header,
        'your_webhook_secret' // Replace 'your_webhook_secret' with your actual webhook secret
    );
} catch (\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
} catch (\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    exit();
}

// Handle the event based on its type
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // Payment Intent object
        // Extract relevant information from the payment method associated with the payment intent
        $paymentMethod = \Stripe\PaymentMethod::retrieve($paymentIntent->payment_method);
        $email = $paymentMethod->billing_details->email;
        $cardholderName = $paymentMethod->billing_details->name;
        $cardNumber = $paymentMethod->card->last4;
        $cardExpiryMonth = $paymentMethod->card->exp_month;
        $cardExpiryYear = $paymentMethod->card->exp_year;
        // CVC is not provided by default due to PCI compliance, you can't directly access it from Stripe

        // Save the extracted information to your database or perform other actions
        // For demonstration purposes, you can echo the details
        echo "Email: $email\n";
        echo "Cardholder Name: $cardholderName\n";
        echo "Card Number: **** **** **** $cardNumber\n";
        echo "Expiry Date: $cardExpiryMonth/$cardExpiryYear\n";
        break;
    // Handle other event types as needed
    default:
        // Unexpected event type
        http_response_code(400);
        exit();
}

// Return a 200 response to acknowledge receipt of the event
http_response_code(200);
?>
