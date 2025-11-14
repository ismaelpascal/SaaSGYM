<div id="addClient" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
    
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Registrar Nuevo Cliente</h3>
            <button id="addClientClose" class="text-gray-400 hover:text-gray-600 text-3xl">✖️</button>
        </div>

        <form id="addClientForm" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" id="apellido" name="apellido" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
                    <input type="number" id="dni" name="dni" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="fechaNac" class="block text-sm font-medium text-gray-700 mb-1">Fecha de nacimiento</label>
                    <input type="date" id="fechaNac" name="fechaNac" required class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-500">
                </div>
            </div>

            <div>
                <label for="gmail" class="block text-sm font-medium text-gray-700 mb-1">Gmail</label>
                <input type="email" id="gmail" name="gmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="contactoEmergencia" class="block text-sm font-medium text-gray-700 mb-1">Contacto de emergencia</label>
                <input type="tel" id="contactoEmergencia" name="contactoEmergencia" placeholder="No obligatorio" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="domicilio" class="block text-sm font-medium text-gray-700 mb-1">Domicilio</label>
                <input type="text" id="domicilio" name="domicilio" placeholder="No obligatorio" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            
            <div class="pt-4 flex justify-end space-x-2">
                 <button type="button" id="addClientCancel" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">Cancelar</button>
                 <button type="submit" id="addClientSubmitBtn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Guardar Cliente</button>
            </div>
        </form>

    </div>
</div>