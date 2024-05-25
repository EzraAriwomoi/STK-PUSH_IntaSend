<?php

require 'vendor/autoload.php';

use IntaSend\IntaSendPHP\Checkout;
use IntaSend\IntaSendPHP\Customer;

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://sandbox.intasend.com/api/v1/checkout/', [
    'headers' => [
      'accept' => 'application/json',
      'content-type' => 'application/json',
    ],
  ]);

// Create customer data
$customer = new Customer();
$customer->first_name = "Joe";
$customer->last_name = "Doe";
$customer->email = "joe@doe.com";
$customer->country = "KE";
$customer->city = "Nairobi";
$customer->address = "Apt 123, Westland road";
$customer->zipcode = "0100";
$customer->state = "Nairobi";

$amount = 10;
$currency = "KES";

// Define redirect and host URLs
$host = "https://example.com";
$redirect_url = "https://example.com/callback";
$ref_order_number = "test-order-10";

// Initialize Checkout
$checkout = new Checkout();
$checkout->init($credentials);

// Create a new checkout session
try {
    $resp = $checkout->create(
        $amount,
        $currency,
        $customer,
        $host,
        $redirect_url,
        $ref_order_number,
        null,  // Optional comment
        null   // Optional method
    );
    print_r($resp);
} catch (GuzzleHttp\Exception\ClientException $e) {
    // Log the response for debugging
    echo 'ClientException: ' . $e->getMessage();
    echo "\nResponse:\n" . $e->getResponse()->getBody()->getContents();
} catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage();
}

?>
