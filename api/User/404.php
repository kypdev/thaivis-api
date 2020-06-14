<?php
$res = [
    'status' => http_response_code(404),
    'message' => 'Not found'
];

print_r(json_encode($res));