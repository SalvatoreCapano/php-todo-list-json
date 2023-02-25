<?php

$dataJsonString = file_get_contents('database.json');
$dataDecoded = json_decode($dataJsonString, true);

// Aggiunta nuovo elemento all'array
$dataDecoded[] = [
    'task' => $_POST['newTask'],
    'done' => false,
];;

$dataEncoded = json_encode($dataDecoded);

// Sovrascrittura nuovi dati nel file .json
file_put_contents('database.json', $dataEncoded);

// Invio della risposta
$response = [
    'success' => true,
    'message' => 'Ok',
    'code' => 200
];

header('Content-Type: application/json');

echo json_encode($response);
echo $dataEncoded;