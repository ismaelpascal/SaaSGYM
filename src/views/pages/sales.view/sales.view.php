<?php include __DIR__ . '/../../layouts/header.php';?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">
        <header class="flex-shrink-0 bg-white border-b">
            <div class="p-4">
                <nav class="flex space-x-6">
                    <a href="/SaaSGYM/public/sales" class="text-lg font-semibold text-blue-600 border-b-2 border-blue-600 pb-1">Punto de Venta</a>
                    <a href="/SaaSGYM/public/sales/catalog" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Gestión de Productos</a>
                    <a href="/SaaSGYM/public/sales/ticket" class="text-lg font-semibold text-gray-500 hover:text-gray-800">Ventas a Retirar</a>
                </nav>
            </div>
        </header>
        <div class="flex flex-grow overflow-hidden">

            <?php include __DIR__ . '/../../components/clientList.php'; ?>

            <div class="w-2/4 p-6 flex flex-col space-y-6 overflow-y-auto">
                <?php include __DIR__ . '/../../components/sales/productCatalog.php'; ?>
            </div>
            <div class="w-1/4 p-6 bg-white flex flex-col">
                <?php include __DIR__ . '/../../components/sales/salesTicket.php'; ?>
            </div>
        </div>
    </main>
</div>

<?php include __DIR__ . '/../../layouts/footer.php';?>
