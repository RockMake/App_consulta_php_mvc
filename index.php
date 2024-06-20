<?php
require 'db/config.php';
require 'controllers/HomeController.php';
require 'controllers/LoginController.php';
require 'controllers/RegisterController.php';
require 'controllers/ResultsController.php';
require 'controllers/AboutController.php';
require 'models/User.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$userModel = new User($pdo);


if ($uri === '/' || $uri === '/app_consulta_php_mvc/' || $uri === '/home') {
    $controller = new HomeController();
    $controller->index();
} elseif ($uri === '/app_consulta_php_mvc/login') {
    $controller = new LoginController($userModel);
    $controller->index();
} elseif ($uri === '/app_consulta_php_mvc/login/authenticate') {
    $controller = new LoginController($userModel);
    $controller->authenticate();
} elseif ($uri === '/app_consulta_php_mvc/register') {
    $controller = new RegisterController($userModel);
    $controller->index();
} elseif ($uri === '/app_consulta_php_mvc/register/register') {
    $controller = new RegisterController($userModel);
    $controller->register();
} elseif ($uri === '/app_consulta_php_mvc/results') {
    $controller = new ResultsController($pdo);
    $controller->index();
} elseif ($uri === '/app_consulta_php_mvc/result/search') {
    $controller = new ResultsController($userModel);
} elseif ($uri === '/app_consulta_php_mvc/about') {
    $controller = new AboutController();
    $controller->index();
} else {
    header("HTTP/1.1 404 Not Found");
    echo "404 Not Found";
}
