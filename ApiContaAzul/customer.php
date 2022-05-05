<?php

session_start();
print_r($_SESSION['session_token']);

$customer = [
    "name" => "Test C.",
    "person_type" => "NATURAL",
    "document" => "958.289.140-81",
    "contacts" => [
        ["name" => "Test C."]
    ]
];

$product = [
    "name" => "Sdasdas",
    "value" => 100,
    "cost" => 80,
    "code" => "Game-4",
    "barcode" => "401234567890",
    "available_stock" => 1000,
    "ncm_code" => "96230000",
    "cest_code" => "0200500",
    "net_weight" => 10,
    "gross_weight" => 15
];

$data =  json_encode($customer);

$url = 'https://api.contaazul.com/v1/customers';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer Mn9fogkKw7BJaClDBOxow2u43gxxbnVu'
];

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);

print_r($resp);
