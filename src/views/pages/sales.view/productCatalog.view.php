<?php include __DIR__ . '/../../layouts/header.php';?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">
        <header class="flex-shrink-0 bg-white border-b">
            <div class="p-4">
                <nav class="flex space-x-6">
                    <a href="/SaaSGYM/public/sales" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Punto de Venta</a>
                    <a href="/SaaSGYM/public/sales/catalog" class="text-lg font-semibold text-blue-600 border-b-2 border-blue-600 pb-1">Gestión de Productos</a>
                    <a href="/SaaSGYM/public/sales/ticket" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Ventas a Retirar</a>
                </nav>
            </div>
        </header>

        <div class="flex-grow flex flex-col overflow-hidden">
            <header class="flex-shrink-0 p-6 border-b border-gray-200 bg-white flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Inventario de Productos</h1>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-500">Productos Totales</p>
                        <p id="productTotalCount" class="text-2xl font-bold text-gray-900">...</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-500">Ventas (Este Mes)</p>
                        <p class="text-2xl font-bold text-gray-900">$000,000</p>
                    </div>
                    <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 flex items-center font-semibold">
                        <span>➕ Añadir Producto</span>
                    </button>
                </div>
            </header>

            <?php include __DIR__ . '/../../components/sales/inventory.php'; ?>

        </div>

    </main>
</div>

<?php include __DIR__ . '/../../layouts/footer.php';?>