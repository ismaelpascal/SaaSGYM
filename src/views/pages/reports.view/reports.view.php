<!-- ingresos, socios activos / inactivos, socios que se dieron de baja, proximos vencimientos
 reportes financioeros (por tipo de plan, metodo de pago, deudores, etc)
 reportes por horario, de la clases popularidad, horarios
 reportes de miembros -->


<?php include __DIR__ . '/../../layouts/header.php';?>

    <div class="flex h-screen overflow-hidden">

        <?php include __DIR__ . '/../../components/sideBar.php'; ?>

        <main class="flex-grow flex flex-col overflow-hidden">
            <div class="flex-grow flex flex-col overflow-hidden">
                
                <header class="flex-shrink-0 bg-white border-b">
                    <div class="p-4">
                        <nav class="flex space-x-6">
                            <a href="/SaaSGYM/public/" class="text-lg font-semibold text-blue-600 border-b-2 border-blue-600 pb-1">Panel Principal</a>
                            <a href="/SaaSGYM/public/" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Panel Financiero</a>
                            <a href="/SaaSGYM/public/" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Socios y Retención</a>
                            <a href="/SaaSGYM/public/" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Panel Operativo</a>
                            <a href="/SaaSGYM/public/" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Reportes Personalizados</a>

                            <div class="flex items-center space-x-1">
                                <a class="px-3 py-1 text-sm font-medium text-gray-500 hover:text-gray-800">Hoy</a>
                                <a class="px-3 py-1 text-sm font-medium text-gray-500 hover:text-gray-800">7 Días</a>
                                <a class="px-3 py-1 text-sm font-medium text-blue-600 border-b-2 border-blue-600 pb-1">Este Mes</a>
                                <a class="px-3 py-1 text-sm font-medium text-gray-500 hover:text-gray-800">Trimestre</a>
                                <a class="px-3 py-1 text-sm font-medium text-gray-500 hover:text-gray-800">Año</a>
                                <input type="date" class="px-3 py-1 text-sm border-gray-300 rounded-md">
                            </div>
                        </nav>
                    </div>
                </header>

            </div>
        </main>
    </div>

<?php include __DIR__ . '/../../layouts/footer.php';?>