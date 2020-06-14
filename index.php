<?php
// echo '<h1>manage route</h1><br><hr>';
// echo '<h1>Api</h1><br><hr>';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

$routes = [
    '' => 'api/User/user.php',
    'api' => 'api',
    'api/user/login' => 'api/User/login2.php'
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    // require 'api/not_found_page.php';
    echo 'not found';
}
