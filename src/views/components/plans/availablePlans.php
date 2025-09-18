<!-- 1. Planes Disponibles -->
<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-gray-800">Planes Disponibles</h3>
        <button id="addPlanTrigger" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 font-semibold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
            <span>Crear Nuevo Plan</span>
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="border p-4 rounded-lg bg-gray-50">
            <h4 class="font-bold text-gray-900">Plan Mensual</h4>
            <p class="text-sm text-gray-600">Acceso ilimitado por 30 días.</p>
            <p class="text-lg font-bold text-right mt-2">$30,000</p>
        </div>

        <?php for ($i = 0; $i < 20; $i++): ?>
        <div class="border p-4 rounded-lg bg-gray-50">
            <h4 class="font-bold text-gray-900">Plam ***</h4>
            <p class="text-sm text-gray-600">*****.</p>
            <p class="text-lg font-bold text-right mt-2">$**,***</p>
        </div>
        <?php endfor; ?>

    </div>
</div>
