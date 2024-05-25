<?php
include './credentials.php';
include './vendor/autoload.php';

use IntaSend\IntaSendPHP\Transfer;

global $credentials;

$transactions = [
    ['account'=>'254740408496','amount'=>'10', 'narrative'=>'Salary'],
];

$transfer = new Transfer();
$transfer->init($credentials);

$response=$transfer->mpesa("KES", $transactions);

//call approve method for approving last transaction
$response = $transfer->approve($response);
print_r($response);

// How to check or track the transfer status
$response = $transfer->status($response->tracking_id);
print_r($response);