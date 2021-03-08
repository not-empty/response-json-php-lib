<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ResponseJson\ResponseJson;

$responseJson = new ResponseJson();

$token = [
	'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.' .
		'eyJhdWQiOiJ0ZXN0IiwiZXhwIjozMCwiaWF0I' .
		'joxNTYyMTcwOTIwLCJpc3MiOiJ0ZXN0Iiwic3' .
		'ViIjoiIn0=.wPdhZtjpyBjObFWbxPx33GNJpv' .
		'KHIznPV0GQ2NiQp5A=',
	'valid_until' => '2020-06-16 12:36:34',
];

$data = [
	'data' => 'test',
];

$response = $responseJson->response(
    'd0684895-cb6c-4c9a-a0aa-0aed7cfc1f46',
    microtime(true)-0.1,
    $token,
    $data,
    'message'
);

print_r($response);
echo PHP_EOL;

$responseDelete = $responseJson->responseDelete();
print_r($responseDelete);
