<?php

function dd($value)
{
    echo "<pre>";

    var_dump($value);

    echo "</pre>";
    die();
}

function base_path($path)
{

    return BASE_PATH . $path;
}

function view($path)
{
    return base_path('view/' . $path);
}

function abort($code = 404){

    http_response_code($code);
    require 'controller/404.php';
    die();

}