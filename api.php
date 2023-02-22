<?php

header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

$dataJsonString = file_get_contents('database.json');
$dataDecoded = json_decode($dataJsonString, true);

$response = [
    'success' => true,
    'message' => 'Ok',
    'code' => 200,
    'list' => $dataDecoded
];

$jsonResponse = json_encode($response);

// // var_dump($jsonResponse);

header('Content-Type: application/json');

echo $jsonResponse;