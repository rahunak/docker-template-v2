
<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/':
        require __DIR__ . '/views/home.php';
        break;
    case '/users':
       require __DIR__ . '/views/users.php';
       break;
       
    default:
      http_response_code(404);
      require __DIR__ . '/views/404.php';
}


include ('./regions/head.php');
include ('./regions/header.php');
include ('./regions/footer.php');