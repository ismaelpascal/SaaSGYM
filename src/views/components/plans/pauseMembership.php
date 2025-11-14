<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-gray-800">Gestionar Membresía</h3>
        <div class="flex items-center space-x-4">
            <button class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 font-semibold">
                Configurar Notificaciones
            </button>
        </div>
    </div>
    
    <div id="pauseMembershipPlaceholder" class="border rounded-lg p-6 bg-gray-50 ">
        <div class="pb-4 border-b">
            <h4 class="font-bold text-gray-400 mb-4 text-lg">Información del Cliente</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 text-sm text-gray-400">
                <p><span class="font-semibold">Nombre: ***</span></p>
                <p><span class="font-semibold">DNI: ***</span></p>
                <p><span class="font-semibold">Teléfono: ***</span></p>
                <p><span class="font-semibold">Email: ***</span></p>
            </div>
        </div>
        <div class="mt-4 flex items-center justify-between text-gray-400">
            <div>
                <p class="text-sm"><span class="font-semibold">Plan Actual: ***</span></p>
                <p class="text-sm"><span class="font-semibold">Vencimiento: ***</span></p>
            </div>
            <div class="flex space-x-2">
                <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded-md font-semibold">Notificar</button>
                <button type="submit" class="bg-gray-400 text-white py-2 px-4 rounded-md font-semibold">Congelar Membresía</button>
            </div>
        </div>
    </div>

    <div id="pauseMembershipData" class="border rounded-lg p-6 bg-white hidden">
        <div class="pb-4 border-b">
            <h4 class="font-bold text-gray-800 mb-4 text-lg">Información del Cliente</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 text-sm">
                <p><span class="font-semibold text-gray-600">Nombre:</span> <span id="pauseMembershipNombre"></span></p>
                <p><span class="font-semibold text-gray-600">DNI:</span> <span id="pauseMembershipDni"></span></p>
                <p><span class="font-semibold text-gray-600">Teléfono:</span> <span id="pauseMembershipTelefono"></span></p>
                <p><span class="font-semibold text-gray-600">Email:</span> <span id="pauseMembershipEmail"></span></p>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <div>
                <p class="text-sm"><span class="font-semibold">Plan Actual:</span> <span id="pauseMembershipPlan"></span></p>
                <p class="text-sm"><span class="font-semibold">Vencimiento:</span> <span id="pauseMembershipVencimiento"></span></p>
            </div>
            <div class="flex space-x-2">
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 font-semibold">Notificar</button>
                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 font-semibold">Congelar Membresía</button>
            </div>
        </div>
    </div>
</div>