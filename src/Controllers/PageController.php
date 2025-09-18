<?php

// SIN NAMESPACE

class PageController
{
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
        require __DIR__ . '/../views/pages/clients.view.php';
    }

    public function showCollection()
    {
        $pageTitle = 'Cobranza y Finanzas';
        require __DIR__ . '/../views/pages/collection.view.php';
    }

    public function showPlans()
    {
        $pageTitle = 'Gestión de Planes';
        require __DIR__ . '/../views/pages/plans.view.php';
    }

    public function showTrain()
    {
        $pageTitle = 'Entrenamiento';
        require __DIR__ . '/../views/pages/train.view.php';
    }

    public function showSales()
    {
        $pageTitle = 'Ventas';
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
        require __DIR__ . '/../views/pages/sales.view/productCatalog.view.php';
    }

    public function showReports()
    {
        $pageTitle = 'Reportes y Análisis';
        require __DIR__ . '/../views/pages/reports.view/reports.view.php';
    }
}

