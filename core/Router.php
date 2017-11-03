<?php

namespace App\Core;

class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;

        return $router;
    }

    public function routes()
    {
        return $this->routes;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        } else {
            throw new Exception('No route defined');
        }

    }

    protected function callAction($controller, $action)
    {

        $controller = 'App\\Controllers\\' . $controller;
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception("$controller does not have an $action method");
        }

        return $controller->$action();
    }
}