<?php

$dataJsonString = file_get_contents('database.json');
$dataDecoded = json_decode($dataJsonString, true);

// Trasformo la stringa index in intero
$index = intval($_POST['index']);

// Inverto il valore di 'done' dell'elemento di indice $index
$dataDecoded[$index]['done'] = !$dataDecoded[$index]['done'];

// Sovrascrivo i nuovi dati nel file
$newData = json_encode($dataDecoded);

file_put_contents('database.json', $newData);

// Invio la risposta
$response = [
    'success' => true,
    'message' => 'Ok',
    'code' => 200
];

header('Content-Type: application/json');

echo json_encode($response);