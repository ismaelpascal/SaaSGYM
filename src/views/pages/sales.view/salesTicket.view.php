<?php include __DIR__ . '/../../layouts/header.php';?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">
        <header class="flex-shrink-0 bg-white border-b">
            <div class="p-4">
                <nav class="flex space-x-6">
                    <a href="/SaaSGYM/public/sales" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Punto de Venta</a>
                    <a href="/SaaSGYM/public/sales/catalog" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Gestión de Productos</a>
                    <a href="/SaaSGYM/public/sales/ticket" class="text-lg font-semibold text-blue-600 border-b-2 border-blue-600 pb-1">Ventas a Retirar</a>
                </nav>
            </div>
        </header>
        <div class="flex-grow flex flex-col overflow-hidden">
            <header class="flex-shrink-0 p-6 border-b border-gray-200 bg-white flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Retiro de Pendientes</h1>
                </div>

                <div class="flex items-center space-x-6 pr-48">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-500">Pendientes de Retiro</p>
                        <p class="text-2xl font-bold text-gray-900">124</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-500">Ventas (Este Mes)</p>
                        <p class="text-2xl font-bold text-gray-900">$250,800</p>
                    </div>
                </div>
            </header>

            <?php include __DIR__ . '/../../components/sales/pendingItems.php'; ?>

        </div>
    </main>
</div>

<?php include __DIR__ . '/../../layouts/footer.php';?>