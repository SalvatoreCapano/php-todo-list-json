<?php

header("Access-Control-Allow-Origin: http://127.0.0.1:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// Trasforma il file .json in stringa
$dataJsonString = file_get_contents('database.json');

// Trasforma la stringa in array associativo
$dataDecoded = json_decode($dataJsonString, true);

$response = [
    'success' => true,
    'message' => 'Ok',
    'code' => 200,
    'list' => $dataDecoded
];

// Trasformo la risposta in .json
$jsonResponse = json_encode($response);

// // var_dump($jsonResponse);

header('Content-Type: application/json');

echo $jsonResponse;