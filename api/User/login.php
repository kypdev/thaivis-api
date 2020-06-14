<?php
header("Access-control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/users.php';

$database = new Database();
$db = $database->getConnection();
$data = json_decode(file_get_contents("php://input"));
$users = new Users($db);
$users->email = $data->email;
$users->passwords = $data->passwords;
$stmt = $users->login();
$num = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($num > 0) {
    http_response_code(200);
    $user_arr = array(
        "statusCode" => http_response_code(200),
        "status" => true,
        "message" => "Successfully signin!",
        "id" => $row['id'],
        "username" => $row['email']
    );
} else {
    $user_arr = array(
        "status" => false,
        "message" => "Invalid Username of Password !",

    );
}

print_r(json_encode($user_arr));
