<div class="bg-white p-6 rounded-lg border border-gray-200">
    <div class="flex justify-between items-center border-b pb-2 mb-4">
        <h3 class="text-xl font-bold text-gray-800">Historial de Pagos</h3>
            <button id="openPaymentModalBtn" class="flex items-center bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors
            <?php if (!isset($selected_member)) echo 'hidden'; // Oculta el botón si no hay cliente ?>">
                Cobrar
            </button>
    </div>

    <ul>
        <?php if (isset($member_payments) && !empty($member_payments)): ?>
            <?php foreach ($member_payments as $payment): ?>
                <li class="flex justify-between py-1">
                    <span class="text-gray-600"><?= htmlspecialchars(date('d/m/Y', strtotime($payment['fecha_pago']))) ?> - Plan (<?= htmlspecialchars($payment['metodo_pago']) ?>)</span> 
                    <span class="font-mono">$<?= htmlspecialchars(number_format($payment['monto'], 2, ',', '.')) ?></span>
                </li>
            <?php endforeach; ?>

        <?php elseif (isset($selected_member)): ?>
            <li class="text-gray-500">Este cliente no tiene pagos registrados.</li>
        
        <?php else: ?>
            <li class="text-gray-500">Selecciona un cliente para ver su historial de pagos.</li>
        <?php endif; ?>
    </ul>
</div>