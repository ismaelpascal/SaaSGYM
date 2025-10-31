<?php

require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Products.php';
require_once __DIR__ . '/../Models/MemberNote.php';
require_once __DIR__ . '/../Models/PaymentHistory.php';

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

        // 2. OBTENER *SIEMPRE* LA LISTA COMPLETA (para la izquierda)
        $members = Member::findAll();

        // 3. PREPARAR VARIABLES PARA LOS DATOS (de la derecha)
        $selected_member = null;
        $member_notes = null;
        $member_payments = null;
        $selected_id = 0; // Para saber cuál resaltar

        // 4. REVISAR SI LA URL TRAE UN ID (Ej: /clients?id=123)
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $selected_id = (int)$_GET['id'];

            // 5. SI HAY ID, BUSCAR TODOS LOS DATOS DE ESE CLIENTE
            $selected_member = Member::findById($selected_id);
            $member_notes = MemberNote::findById($selected_id);
            $member_payments = PaymentHistory::findByMemberId($selected_id);
        }

        // 6. CARGAR LA VISTA
        // Ahora, la vista tendrá acceso a $members (la lista)
        // y opcionalmente a $selected_member, $member_notes y $member_payments
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

