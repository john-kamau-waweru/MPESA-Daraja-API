<?php

include 'accessToken.php';

date_default_timezone_set('Africa/Nairobi');
$processRequestUrl = "";
$callbackUrl = "";
$passKey = "";
$businessShortCode = "";
$timestamp = date('YmdHis');
// Encrypt Password
$password = base64_encode($businessShortCode . $passKey . $timestamp);

$phone = "";
$money = "";
$partyA = "";
$partyB = "";
$accountReference = "";
$transactionDesc = "";
$amount = $money;

$stkPushHeader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processRequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkPushHeader);


