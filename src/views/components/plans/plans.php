<main class="flex-grow flex flex-col overflow-hidden">
    
    <!-- Header de la página -->
    <div class="flex-shrink-0 p-6 border-b border-gray-200 bg-white flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Gestión de Planes y Membresías</h1>
            <p class="text-gray-500 mt-1">Crea, automatiza y gestiona las membresías de tus socios.</p>
        </div>
        <button id="addPlanTrigger" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 font-semibold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
            <span>Crear Nuevo Plan</span>
        </button>
    </div>

    <!-- Contenido desplazable -->
    <div class="flex-grow p-6 overflow-y-auto space-y-8">
        
        <!-- 1. Creación de Planes Flexibles -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Mis Planes</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tarjeta de Plan (Ejemplo) -->
                <div class="border p-4 rounded-lg bg-gray-50">
                    <h4 class="font-bold text-gray-900">Plan Mensual</h4>
                    <p class="text-sm text-gray-600">Acceso ilimitado por 30 días.</p>
                    <p class="text-lg font-bold text-right mt-2">$30,000</p>
                </div>
                <!-- Tarjeta de Plan (Ejemplo) -->
                <div class="border p-4 rounded-lg bg-gray-50">
                    <h4 class="font-bold text-gray-900">Pack 10 Clases</h4>
                    <p class="text-sm text-gray-600">Válido por 10 clases de CrossFit.</p>
                    <p class="text-lg font-bold text-right mt-2">$25,000</p>
                </div>
                    <!-- Tarjeta de Plan (Ejemplo) -->
                <div class="border p-4 rounded-lg bg-gray-50">
                    <h4 class="font-bold text-gray-900">Pase Diario</h4>
                    <p class="text-sm text-gray-600">Acceso por un día.</p>
                    <p class="text-lg font-bold text-right mt-2">$3,500</p>
                </div>
            </div>
        </div>

        <!-- 2. Automatización de Renovaciones -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Automatización de Renovaciones</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <p class="font-medium text-gray-700">Enviar recordatorio de vencimiento por WhatsApp/Email.</p>
                    <div class="flex items-center space-x-2">
                        <input type="number" value="5" class="w-16 text-center border-gray-300 rounded-md">
                        <span>días antes</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Congelamiento de Planes -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Congelar Membresía</h3>
            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                <input type="text" placeholder="Buscar socio por nombre o ID para congelar su plan..." class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <button class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 font-semibold">Congelar</button>
            </div>
        </div>

    </div>
</main>