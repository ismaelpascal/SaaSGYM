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
        // Primero, buscar una coincidencia exacta (rutas estáticas como /api/members)
        if (array_key_exists($uri, $this->routes[$method])) {
            $this->callAction(...explode('@', $this->routes[$method][$uri]));
            return;
        }

        // Manejar rutas dinámicas (ej: /api/members/1)
        foreach ($this->routes[$method] as $route => $action) {
            // Convertir la ruta a una expresión regular
            if (strpos($route, '{') !== false) {
                $pattern = preg_replace('#\{[^/]+\}#', '(\d+)', $route);
                $pattern = "#^$pattern$#";

                if (preg_match($pattern, $uri, $matches)) {
                    array_shift($matches); // Quitar la coincidencia completa
                    $params = $matches;

                    // CORRECCIÓN: Se llama a callAction sin el desempaquetado para evitar el error.
                    list($controller, $actionName) = explode('@', $action);
                    $this->callAction($controller, $actionName, $params);
                    return;
                }
            }
        }
        
        http_response_code(404);
        echo "<h1>404 Not Found</h1><p>La página que buscas no existe.</p>";
    }
    
    protected function callAction($controller, $action, $params = [])
    {
        if (class_exists($controller)) {
            $controllerInstance = new $controller();
            if (method_exists($controllerInstance, $action)) {
                // Llamar al método del controlador con los parámetros
                call_user_func_array([$controllerInstance, $action], $params);
                return;
            }
        }

        // Error si el controlador o la acción no existen
        http_response_code(500);
        echo "<h1>500 Server Error</h1><p>El controlador o la acción no se encontraron.</p>";
    }
}

