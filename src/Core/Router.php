<?php

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controllerAction)
    {
        $this->routes['GET'][$uri] = $controllerAction;
    }

    public function post($uri, $controllerAction)
    {
        $this->routes['POST'][$uri] = $controllerAction;
    }

    public function dispatch($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            list($controller, $action) = explode('@', $this->routes[$method][$uri]);

            if (class_exists($controller)) {
                $controllerInstance = new $controller();
                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action();
                    return;
                }
            }
        }

        http_response_code(404);
        echo "<h1>404 Not Found</h1><p>La página que buscas no existe.</p>";
    }
}

