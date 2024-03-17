<?php

include('../includes/connect.php');
include('../functions/common_functions.php');
require('config.php');
require('razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//

$price = computeTotalPrice();
$_SESSION['price'] = $price;
$customername = $_SESSION['username'];
$email = 'sample@example.com';
$_SESSION['email'] = $email;
$contactno = 9999999999;

$orderData = [
  'receipt' => 3456,
  'amount' => $price * 100,
  // 2000 rupees in paise
  'currency' => 'INR',
  'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
  $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
  $exchange = json_decode(file_get_contents($url), true);

  $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
  "key" => $keyId,
  "amount" => $amount,
  "name" => "BetterBuy.com",
  "description" => "You Better Buy.",
  "image" => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
  "prefill" => [
    "name" => $customername,
    "email" => $email,
    "contact" => $contactno,
  ],
  "notes" => [
    "address" => "Hello World",
    "merchant_order_id" => "12312321",
  ],
  "theme" => [
    "color" => "#F37254"
  ],
  "order_id" => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
  $data['display_currency'] = $displayCurrency;
  $data['display_amount'] = $displayAmount;
}

$json = json_encode($data);
?>

<style>
  .razorpay-payment-button {
    padding: 10px;
    margin-left: 47%;
    margin-top: 20px;
    padding-left: 20px;
    padding-right: 20px;
    margin-bottom: 20px;
    border: solid grey 1px;
    border-radius: 7px;
    /* background-color: red; */
  }
</style>

<form action="../payment/verify.php" method="POST">
  <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>"
    data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>"
    data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>"
    data-prefill.name="<?php echo $data['prefill']['name'] ?>"
    data-prefill.email="<?php echo $data['prefill']['email'] ?>"
    data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?>
      data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
      data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
    </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
</form>