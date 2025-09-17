<div>
    <div class="p-4 border-b border-gray-200 flex items-center space-x-4">

        <div class="flex-grow">
            <input type="text" placeholder="Buscar miembro por nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md">
        </div>

        <button id="addClientTrigger" class="flex items-center bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
            <span>➕ Añadir</span>
        </button>
    </div>

    <div id="filter-options" class="hidden absolute right-4 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-xl z-10">
        <div class="p-4">
            <h4 class="font-bold text-gray-800 mb-2">Filtrar por estado</h4>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700">Activos</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                    <span class="ml-2 text-gray-700">Vencidos</span>
                </label>
            </div>
        </div>
    </div>
</div>
