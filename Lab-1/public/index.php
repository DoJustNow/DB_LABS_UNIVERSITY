<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once('../route/web.php');
$route  = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)) {
    $controllerClass = 'app\controller\\' . $routes[$route]['controller'];
    $controller      = new $controllerClass();
    $controller->{$routes[$route]['action']}();
} else {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    require_once('../app/view/404.php');
}
