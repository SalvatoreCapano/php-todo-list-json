<?php

$todoDataString = file_get_contents('database.json');
$todoDataDecoded = json_decode($todoDataString, true);

$newTodo = [
    'task' => $_POST['taskName'],
    'done' => false,
];

$todoDataDecoded[] = $newTodo;

$todoDataEncoded = json_encode($todoDataDecoded);

file_put_contents('database.json', $todoDataEncoded);

$response = [
    'success' => true,
    'message' => 'Ok',
    'code' => 200
];

header('Content-Type: application/json');

echo json_encode($response);
