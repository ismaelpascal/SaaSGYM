<div class="flex flex-col bg-white border-r border-gray-200">
    
    <div class="flex-grow overflow-y-auto">
        
        <?php if (isset($members) && !empty($members)): ?>
            <?php foreach ($members as $index => $member): ?>
                <?php
                    // Lógica para determinar el texto y color del estado de la membresía
                    $statusText = 'Sin Plan';
                    $statusClass = 'text-gray-500'; // Color por defecto
                    if (!empty($member['estado'])) {
                        $statusText = ucfirst($member['estado']); // Pone la primera letra en mayúscula
                        if ($member['estado'] === 'activo') {
                            $statusClass = 'text-green-600';
                        } elseif ($member['estado'] === 'vencido') {
                            $statusClass = 'text-red-600';
                        }
                    }
                    $planText = $member['plan_nombre'] ?? 'N/A';
                    
                    // Clase para el fondo del miembro seleccionado (simulando la captura)
                    // Puedes cambiar esta lógica para que se base en un ID de la URL
                    $bgClass = ($index === 1) ? 'bg-blue-100' : 'hover:bg-gray-50';
                ?>
                <a href="#" class="block p-4 border-b border-gray-200 <?= $bgClass ?>">
                    <p class="font-semibold"><?= htmlspecialchars($member['nombre'] . ' ' . $member['apellido']) ?></p>
                    <p class="text-sm text-gray-500">
                        <?= htmlspecialchars($planText) ?> - <span class="font-semibold <?= $statusClass ?>"><?= htmlspecialchars($statusText) ?></span>
                    </p>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="p-4 text-center text-gray-500">No se encontraron miembros.</p>
        <?php endif; ?>

    </div>
</div>
