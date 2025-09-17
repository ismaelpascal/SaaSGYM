<div class="flex-grow p-6 overflow-y-auto space-y-6">
                
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Orden #12045 - 16/09/2025</p>
                            <h3 class="text-xl font-bold text-gray-800">Juan Pérez</h3>
                            <p class="text-gray-600">juan.perez@example.com</p>
                        </div>
                        <span class="text-sm font-semibold text-orange-600 bg-orange-100 py-1 px-3 rounded-full">Pendiente de Retiro</span>
                    </div>
                    <div class="border-t my-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Productos:</h4>
                        <ul class="space-y-1 text-sm text-gray-600">
                            <li class="flex justify-between"><span>1x Proteína Whey</span> <span class="font-mono">$15,000</span></li>
                            <li class="flex justify-between"><span>2x Agua Mineral</span> <span class="font-mono">$1,600</span></li>
                        </ul>
                    </div>
                    <div class="border-t my-4"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Total: $16,600</span>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 font-semibold">Marcar como Entregado</button>
                    </div>
                </div>

                <?php for ($i = 0; $i < 20; $i++): ?>
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Orden #12044 - 15/09/2025</p>
                            <h3 class="text-xl font-bold text-gray-800">Ana García</h3>
                        </div>
                        <span class="text-sm font-semibold text-orange-600 bg-orange-100 py-1 px-3 rounded-full">Pendiente de Retiro</span>
                    </div>
                    <div class="border-t my-4"></div>
                    <div>
                        <h4 class="font-semibold text-gray-700 mb-2">Productos:</h4>
                        <ul class="space-y-1 text-sm text-gray-600">
                            <li class="flex justify-between"><span>1x Remera Dry-Fit</span> <span class="font-mono">$8,000</span></li>
                        </ul>
                    </div>
                    <div class="border-t my-4"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Total: $8,000</span>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 font-semibold">Marcar como Entregado</button>
                    </div>
                </div>
                <?php endfor; ?>

            </div>