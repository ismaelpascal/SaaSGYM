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

    /**
     * Muestra el panel de control (dashboard) visual.
     */
    public function showDashboard()
    {
        $pageTitle = 'Panel de Control';
        require __DIR__ . '/../views/pages/dashboard.view.php';
    }
}

