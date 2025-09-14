<div id="noteHistoryModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
    
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Historial de Notas</h3>
            <button id="closeNoteHistoryBtn" class="text-gray-400 hover:text-gray-600 text-3xl">&times;</button>
        </div>

        <div class="space-y-4 max-h-96 overflow-y-auto">
            
            <div class="p-4 border rounded-lg flex justify-between items-start">
                <div>
                    <p class="text-gray-700">Recordatorio de pago pendiente de la cuota de Septiembre. Se envió notificación.</p>
                    <span class="text-xs text-gray-400">14/09/2025 - Admin</span>
                </div>
                <div class="flex items-center space-x-2 flex-shrink-0 ml-4">
                    <button title="Visible para el cliente" class="text-green-500 hover:text-green-700">👁️‍🗨️0</button>
                    <button class="text-gray-500 hover:text-blue-600">Editar</button>
                    <button class="text-gray-500 hover:text-red-600">Eliminar</button>
                </div>
            </div>

            <div class="p-4 border rounded-lg flex justify-between items-start">
                <div>
                    <p class="text-gray-700">El cliente rompió una mancuerna de 5kg. Se le informó que se agregará al próximo pago.</p>
                    <span class="text-xs text-gray-400">10/09/2025 - Admin</span>
                </div>
                <div class="flex items-center space-x-2 flex-shrink-0 ml-4">
                     <button title="No visible para el cliente" class="text-gray-400 hover:text-gray-600">👁️‍🗨️0</button>
                    <button class="text-gray-500 hover:text-blue-600">Editar</button>
                    <button class="text-gray-500 hover:text-red-600">Eliminar</button>
                </div>
            </div>

        </div>
    </div>
</div>