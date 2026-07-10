<?php

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// MPESA API Keys
$consumerKey = $_ENV["CONSUMER_KEY"];
$consumeSecret = $_ENV["CONSUMER_SECRET"];

// Access Token URL
$accessTokenUrl = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$headers = ['Content-Type:application/json; charset=utf-8'];

$curl = curl_init($accessTokenUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumeSecret);

$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($result);
echo $access_token = $result->access_token;

