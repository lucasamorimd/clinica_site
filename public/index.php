<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
require dirname(__DIR__). '/vendor/autoload.php';
require dirname(__DIR__). '/src/routes.php';

$router->run( $router->routes );