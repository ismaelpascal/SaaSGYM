<?php

require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Products.php';

class PageController
{
 
    private function checkAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /SaaSGYM/public/login');
            exit();
        }
    }
    
    /**
     * Muestra la página de login.
     */
    public function showLogin()
    {
        $pageTitle = 'Iniciar Sesión';
        require __DIR__ . '/../views/pages/login.view.php';
    }

    public function showClients()
    {
        $pageTitle = 'Gestión de Clientes';
        $members = Member::findAll();
        require __DIR__ . '/../views/pages/clients.view.php';
    }

    public function showPlans()
    {
        $pageTitle = 'Gestión de Planes';
        $members = Member::findAll();
        require __DIR__ . '/../views/pages/plans.view.php';
    }

    public function showSales()
    {
        $pageTitle = 'Ventas';
        $members = Member::findAll();
        require __DIR__ . '/../views/pages/sales.view/sales.view.php';
    }

    public function showSalesTicket()
    {
        $pageTitle = 'Venta a Retirar';
        require __DIR__ . '/../views/pages/sales.view/salesTicket.view.php';
    }

    public function showProductCatalog()
    {
        $pageTitle = 'Catálogo de Productos';
        $products = Product::findAll();
        require __DIR__ . '/../views/pages/sales.view/productCatalog.view.php';
    }

}

