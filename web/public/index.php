index
<?php

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/':
        require __DIR__ . '/views/home.php';
        break;
    case '/users':
       require __DIR__ . '/users.php';
       break;
       
    case '/404':
      http_response_code(404);
      require __DIR__ . '/views/404.php';
      break;
}
$test ='';

