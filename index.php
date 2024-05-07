<?php

// session_start();
const BASE_PATH = __DIR__ . '/./';
require 'core/functions.php';
require  'Core/Router.php';
 require 'core/Database.php';

$router = new Router;

$routes = require 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// $dsn  = "msql:host=localhost;dbname=divine-store;password=CHUKS989;";
// $pdo = new PDO($dsn,'divine-store');

// $statement = $pdo->prepare("SELECT * FROM tbl_products");
// $statement->execute();

// $posts = $statement->fetchAll();

// dd($posts);