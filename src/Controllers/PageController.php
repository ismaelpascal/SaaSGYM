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
    
    public function showLogin()
    {
        $pageTitle = 'Iniciar Sesión';
        require __DIR__ . '/../views/pages/login.view.php';
    }

    public function showClients()
    {
        $this->checkAuth();
        $pageTitle = 'Gestión de Clientes';
        require __DIR__ . '/../views/pages/clients.view.php';
    }

    public function showPlans()
    {
        $this->checkAuth();
        $pageTitle = 'Gestión de Planes';
        $plans = MembershipType::findAll();
        require __DIR__ . '/../views/pages/plans.view.php';
    }

    public function showSales()
    {
        $this->checkAuth();
        $pageTitle = 'Ventas';
        require __DIR__ . '/../views/pages/sales.view/sales.view.php';
    }

    public function showSalesTicket()
    {
        $this->checkAuth();
        $pageTitle = 'Venta a Retirar';
        require __DIR__ . '/../views/pages/sales.view/salesTicket.view.php';
    }

    public function showProductCatalog()
    {
        $this->checkAuth();
        $pageTitle = 'Catálogo de Productos';
        $products = Product::findAll();
        require __DIR__ . '/../views/pages/sales.view/productCatalog.view.php';
    }

}

