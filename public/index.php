<?php
// 1. Carga manual de clases (SIN COMPOSER)
require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Controllers/PageController.php';
require_once __DIR__ . '/../src/Controllers/ApiController.php';
require_once __DIR__ . '/../src/Controllers/LoginController.php';

// 2. Crear una instancia del Router
$router = new Router();

// 3. Definir las rutas VISUALES de la aplicación
$router->get('/login', 'PageController@showLogin');
$router->post('/login', 'LoginController@login');
$router->get('/logout', 'LoginController@logout');
$router->get('/', 'PageController@showLogin');

$router->get('/clients', 'PageController@showClients');
$router->get('/plans', 'PageController@showPlans');
$router->get('/sales', 'PageController@showSales');
$router->get('/sales/ticket', 'PageController@showSalesTicket');
$router->get('/sales/catalog', 'PageController@showProductCatalog');

$router->get('/api/members', 'ApiController@getMembers');
$router->get('/api/members/{id}', 'ApiController@getMemberById');
$router->get('/api/products', 'ApiController@getProducts');
$router->get('/api/members/{Id}/notes', 'ApiController@getMemberNotesById');



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
