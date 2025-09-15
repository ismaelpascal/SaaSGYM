<!-- gestion de procesos (CRM simple) / campañas de marqueting por Whatsapp, email (ej: promos)
 creacion de codigos de descuento / promociones -->

<?php include __DIR__ . '/../layouts/header.php';?>

    <div class="flex h-screen overflow-hidden">

        <?php include __DIR__ . '/../components/sideBar.php'; ?>

        <main class="flex-grow flex flex-col overflow-hidden">
        
        <!-- Header de la página -->
        <div class="flex-shrink-0 p-6 border-b border-gray-200 bg-white">
            <h1 class="text-2xl font-bold text-gray-800">Tienda de Productos</h1>
        </div>

        <div class="flex-grow p-6 overflow-y-auto">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <img src="https://placehold.co/400x300/E2E8F0/4A5568?text=Producto" alt="Proteína en Polvo" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">Proteina en Polvo</h3>
                        <p class="text-sm text-gray-500 mt-1">Sabor Chocolate - 1kg</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-xl text-gray-900">$15,000</span>
                            <button class="bg-blue-600 text-white text-sm py-1 px-3 rounded-md hover:bg-blue-700">Añadir</button>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Producto (Ejemplo 2) -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <img src="https://placehold.co/400x300/E2E8F0/4A5568?text=Producto" alt="Creatina Monohidratada" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">Creatina 300g</h3>
                        <p class="text-sm text-gray-500 mt-1">Micronizada</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-xl text-gray-900">$12,500</span>
                            <button class="bg-blue-600 text-white text-sm py-1 px-3 rounded-md hover:bg-blue-700">Añadir</button>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Producto (Ejemplo 3) -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <img src="https://placehold.co/400x300/E2E8F0/4A5568?text=Producto" alt="Remera de Entrenamiento" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">Remera Dry-Fit</h3>
                        <p class="text-sm text-gray-500 mt-1">Talle L - Negro</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-xl text-gray-900">$8,000</span>
                            <button class="bg-blue-600 text-white text-sm py-1 px-3 rounded-md hover:bg-blue-700">Añadir</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    </div>

<?php include __DIR__ . '/../layouts/footer.php';?>