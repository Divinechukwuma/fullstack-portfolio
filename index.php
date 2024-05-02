<?php

session_start();

use core\Router;


$router = new Router();

$routes = require 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


function dd($routes)
{
    echo "<pre>";

    var_dump($routes);

    echo "</pre>";
    die();
}
