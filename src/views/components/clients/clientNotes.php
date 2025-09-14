<div class="bg-white p-6 rounded-lg border border-gray-200 h-full flex flex-col">
    <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Notas del Cliente</h3>
    
    <textarea 
        class="w-full flex-grow p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
        placeholder="Añadir una nota sobre el cliente"
    ></textarea>
    
    <div class="mt-4 flex justify-end space-x-2">
        <button id="openNoteHistoryBtn" type="button" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">
            Ver historial
        </button>
        <button class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Guardar Nota
        </button>
    </div>
</div>
