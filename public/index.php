<?php
// 1. Carga manual de clases (SIN COMPOSER)
// Incluimos explícitamente cada clase que necesitamos.
require __DIR__ . '/../src/Core/Router.php';
require __DIR__ . '/../src/Controllers/PageController.php';
require __DIR__ . '/../src/Controllers/ApiController.php';

// 2. Crear una instancia del Router
// Como ya no hay namespaces, llamamos a la clase directamente.
$router = new Router();

// 3. Definir las rutas VISUALES de la aplicación
$router->get('/login', 'PageController@showLogin');
$router->get('/clients', 'PageController@showClients');
$router->get('/collection', 'PageController@showCollection');
$router->get('/plans', 'PageController@showPlans');
$router->get('/train', 'PageController@showTrain');
$router->get('/sales', 'PageController@showSales');
$router->get('/sales/ticket', 'PageController@showSalesTicket');
$router->get('/sales/catalog', 'PageController@showProductCatalog');
$router->get('/reports', 'PageController@showReports');
$router->get('/', 'PageController@showLogin');

// API Routes
$router->get('/api/members', 'ApiController@getMembers');
$router->get('/api/members/{id}', 'ApiController@getMemberById');
$router->get('/api/products', 'ApiController@getProducts');


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
