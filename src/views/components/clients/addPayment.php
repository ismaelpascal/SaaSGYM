<!-- Contenedor principal del pop-up (oculto por defecto) -->
<div id="addPaymentModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
    
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
        
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Registrar Nuevo Pago</h3>
            <button id="closePaymentModalBtn" class="text-gray-400 hover:text-gray-600 text-3xl">✖️</button>
        </div>

        <form action="#" method="POST" class="space-y-4">
            <div>
                <label for="paymentPlan" class="block text-sm font-medium text-gray-700 mb-1">Seleccionar Plan</label>
                <select id="paymentPlan" name="paymentPlan" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                    <option>Plan Mensual - $7,500</option>
                    <option>Plan Trimestral - $21,000</option>
                    <option>Plan Anual - $80,000</option>
                    <option>Pase Diario - $1,000</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="paymentAmount" class="block text-sm font-medium text-gray-700 mb-1">Monto a Cobrar</label>
                    <input type="number" id="paymentAmount" name="paymentAmount" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="$7,500">
                </div>
                <div>
                    <label for="paymentMethod" class="block text-sm font-medium text-gray-700 mb-1">Método de Pago</label>
                    <select id="paymentMethod" name="paymentMethod" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white">
                        <option>Efectivo</option>
                        <option>Transferencia</option>
                        <option>Tarjeta de Débito</option>
                        <option>Tarjeta de Crédito</option>
                    </select>
                </div>
            </div>
            
            <div class="pt-4 flex justify-end space-x-2">
                 <button type="button" id="cancelPaymentModalBtn" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">Cancelar</button>
                 <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Confirmar Pago</button>
            </div>
        </form>

    </div>
</div>
