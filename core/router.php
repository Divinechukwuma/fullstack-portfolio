<?php

namespace core;

class Router
{

    protected  $routes = [];

    public function add($method, $uri, $controller)
    {

        $this->routes[] = [
            'uri' => $uri,
            'controller' =>  $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    protected function abort($code = 404) {
        http_response_code($code);
        require 'controllers/404.php';

        die();
    }
}
