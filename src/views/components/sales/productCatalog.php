<main class="flex flex-col h-full">
    <nav class="flex-shrink-0 flex space-x-4 p-4 border-b bg-white">
        <a href="#" class="py-2 px-4 rounded-md text-sm font-medium bg-blue-100 text-blue-700">Todos</a>
        <a href="#" class="py-2 px-4 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">Bebidas</a>
        <a href="#" class="py-2 px-4 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">Suplementos</a>
        <a href="#" class="py-2 px-4 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">Ropa</a>
    </nav>
    
    <div class="flex-grow p-4 overflow-y-auto">
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4">

            <button class="bg-white p-3 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <span class="block text-sm font-semibold text-gray-800">Agua Mineral</span>
                <span class="block text-xs text-gray-500">$800</span>
            </button>
            <button class="bg-white p-3 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <span class="block text-sm font-semibold text-gray-800">Proteína Whey</span>
                <span class="block text-xs text-gray-500">$15,000</span>
            </button>
            <button class="bg-white p-3 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <span class="block text-sm font-semibold text-gray-800">Pase Diario</span>
                <span class="block text-xs text-gray-500">$3,000</span>
            </button>

            <?php for ($i = 0; $i < 100; $i++): ?>
            <button class="bg-white p-3 rounded-lg shadow text-center hover:shadow-lg transition-shadow">
                <span class="block text-sm font-semibold text-gray-800">Producto <?= $i + 1 ?></span>
                <span class="block text-xs text-gray-500">$X,000</span>
            </button>
            <?php endfor; ?>
        </div>
    </div>
</main>
