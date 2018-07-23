<?php

return [
  'signature' => env('paypal_signature'),
  'user' => env('paypal_user'),
  'password' => env('paypal_password'),
  'host' => env('paypal_host'),
  'method' => env('paypal_method'),
  'paymentAction' => env('paypal_paymentAction')
];

?>
