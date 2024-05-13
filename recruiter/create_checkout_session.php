<?php
require '../vendor/autoload.php';
require '../recruiter/config.php';

$stripe = new \Stripe\StripeClient(STRIPE_SECRET_KEY);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the total amount and ad type from the POST data
    $totalAmount = $_POST['totalAmount'];
    $adType = $_POST['adType'];

    try {
        // Create a new Price object dynamically based on the total amount
        $price = $stripe->prices->create([
            'unit_amount' => $totalAmount * 100, // Total amount in cents
            'currency' => 'usd', // Currency
            'product_data' => [
                'name' => $adType, // Set the ad type as the product name
            ],
            'recurring' => ['interval' => 'month'], // Customize recurring billing if needed
        ]);

        // Create a Checkout Session using the dynamically created Price object
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $price->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription', // Change mode to 'subscription'
            'success_url' => 'http://localhost/GST_Project/recruiter/success.php',
            'cancel_url' => 'http://localhost/GST_Project/recruiter/create_jobadPAY.php',
        ]);
        header('Location: ' . $session->url);
        exit();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>