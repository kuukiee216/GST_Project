<?php
require_once('../vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51PClCdRtLbUbXSdks7Kk7cNVG8yHOybIMEe9AauA5kc5lwFlqrzvsOgiUjNRB89u11xhWH34V77H5swTxynwDgDI00obVP0vjR');

$token = $_POST['stripeToken'];

try {
    $charge = \Stripe\Charge::create([
        'amount' => round($total * 100), // in cents
        'currency' => 'usd',
        'description' => 'Ad Payment',
        'source' => $token,
    ]);
    // Redirect to a success page or handle success
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Handle error
}
?>