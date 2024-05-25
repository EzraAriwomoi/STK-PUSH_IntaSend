<?php

include './credentials.php';
include_once('./vendor/autoload.php');

use IntaSend\IntaSendPHP\Collection;


function initiateStkPush($amount, $phone_number)
{

  global $credentials;

  $collection = new Collection();
  $collection->init($credentials);

  //initiating the stk push
  $response = $collection->mpesa_stk_push($amount, $phone_number);

  //Get Invoive ID
  $invoice_id = $response->invoice->invoice_id;

  //initialize status variable
  $status = "PROCESSING";

  //check the status
  while ($status == "PROCESSING") {

    sleep(1);

    //check
    $statusResponse = $collection->status($invoice_id);
    //get update on status

    $status = $statusResponse->invoice->state;
  }

  return $status;
}

if (isset($_POST['deposit'])) {
  $phone_number = $_POST['phonenumber'];
  $amount = $_POST['amount'];
  $status = initiateStkPush($amount, $phone_number);

  header("Location:stk.php?status=$status");
  exit();
}





?>

<!DOCTYPE html>
<html data-theme="forest">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STK Push TUT</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <span>
        <?php
        if (isset($_GET['status'])) {
          $status = $_GET['status'];

          if ($status === 'COMPLETE') {
            $class = 'alert-success';
            $message = 'Payment Successful';
          } elseif ($status === 'FAILED') {
            $class = 'alert-error';
            $message = 'Payment Cancelled';
          } else {
            $class = 'alert-warning';
            $message = 'Payment Pending';
          }

        ?>
          <div class="alert <?php echo $class; ?> shadow-lg max-w-sm" id="statusAlert" style="width:400px!important;">
            <div>
              <span><?php echo $message; ?></span>
            </div>
          </div>
        <?php } ?>

      </span>
      <div class="text-center lg:text-left">
        <img src="./pay.svg" alt="illustration" width="400">
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" method="POST" action="stk.php">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Phone Number:</span>
            </label>
            <input type="text" placeholder="254..." class="input input-bordered" name="phonenumber" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Amount:</span>
            </label>
            <input type="text" placeholder="Enter amount" class="input input-bordered" name="amount" required />
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit" name="deposit">Make Payment</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>