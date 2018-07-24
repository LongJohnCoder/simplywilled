<?php

return [
  'signature' => env('paypal_signature', ''),
  'user' => env('paypal_user', ''),
  'password' => env('paypal_password', ''),
  'host' => env('paypal_host', ''),
  'method' => 'DoDirectPayment',
  'paymentAction' => 'Sale'
];

?>
