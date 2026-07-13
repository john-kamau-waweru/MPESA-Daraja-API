<?php

include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processRequestUrl = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
$callbackUrl = "https://lab1.siasaplace.com/daraja/callback.php";
$passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$businessShortCode = "174379";
$timestamp = date('YmdHis');
// Encrypt Password
$password = base64_encode($businessShortCode . $passKey . $timestamp);

$phone = "254718693841";
$money = 1;
$partyA = $phone;
$partyB = $businessShortCode;
$accountReference = "PAYFAST KE";
$transactionDesc = "Best Payfast Fintech";
$amount = $money;
$stkPushHeader = [
  'Content-Type: application/json',
  "Authorization: Bearer {$access_token}"
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processRequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkPushHeader);
$curl_post_data = array(
  "BusinessShortCode" => 174379,
  "Password" => $password,
  "Timestamp" => $timestamp,
  "TransactionType" => "CustomerPayBillOnline",
  "Amount" => $amount,
  "PartyA" => $partyA,
  "PartyB" => $partyB,
  "PhoneNumber" => $partyA,
  "CallBackURL" => $callbackUrl,
  "AccountReference" => $accountReference,
  "TransactionDesc" => $transactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);

echo $curl_response;


