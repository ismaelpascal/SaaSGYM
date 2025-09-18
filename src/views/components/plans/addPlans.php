<!-- Contenedor principal del pop-up, ID "addPlan" -->
<div id="addPlan" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
    
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Crear Nuevo Plan</h3>
            <!-- Botón de cerrar, ID "addPlanClose" -->
            <button id="addPlanClose" class="text-gray-400 hover:text-gray-600 text-3xl">&times;</button>
        </div>

        <form action="#" method="POST" class="space-y-4">
            <!-- ... campos del formulario ... -->
            <div>
                <label for="planNombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Plan</label>
                <input type="text" id="planNombre" name="planNombre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Ej: Plan Trimestral">
            </div>
            <div>
                <label for="planPrecio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" id="planPrecio" name="planPrecio" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Ej: 45000">
            </div>
            
            <div class="pt-4 flex justify-end space-x-2">
                 <!-- Botón de cancelar, ID "addPlanCancel" -->
                 <button type="button" id="addPlanCancel" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">Cancelar</button>
                 <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Guardar Plan</button>
            </div>
        </form>

    </div>
</div>

