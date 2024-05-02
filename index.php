<?php
session_start();
require 'core/functions.php';
use Core\Router;

$router = new Router;

$routes = require 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

