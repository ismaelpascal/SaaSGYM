<?php

// 1. Carga manual de clases (SIN COMPOSER)
// Incluimos explícitamente cada clase que necesitamos.
require __DIR__ . '/../src/Core/Router.php';
require __DIR__ . '/../src/Controllers/PageController.php';

// 2. Crear una instancia del Router
// Como ya no hay namespaces, llamamos a la clase directamente.
$router = new Router();

// 3. Definir las rutas VISUALES de la aplicación
$router->get('/login', 'PageController@showLogin');
$router->get('/clients', 'PageController@showClients');
$router->get('/', 'PageController@showLogin');

// 4. Obtener la URL y el método de la petición
$basePath = '/SaaSGYM/public';
$uri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
$uri = strtok($uri, '?');
if (empty($uri)) {
    $uri = '/';
}
$method = $_SERVER['REQUEST_METHOD'];

// 5. Despachar la ruta
$router->dispatch($uri, $method);


