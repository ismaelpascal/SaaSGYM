<div class="flex flex-col bg-white border-r border-gray-200">
    
    <div class="flex-grow overflow-y-auto">
        
        <?php if (isset($members) && !empty($members)): ?>
            <?php 
            // Esta variable $selected_id viene del PageController
            // Nos dice qué cliente está activo (0 si no hay ninguno)
            $active_id = $selected_id ?? 0; 
            ?>

            <?php foreach ($members as $member): ?>
                <?php
                    // ... (Tu lógica de $statusText y $statusClass no cambia) ...
                    $statusText = 'Sin Plan';
                    $statusClass = 'text-gray-500';
                    if (!empty($member['estado'])) {
                        $statusText = ucfirst($member['estado']);
                        if ($member['estado'] === 'activo') {
                            $statusClass = 'text-green-600';
                        } elseif ($member['estado'] === 'vencido') {
                            $statusClass = 'text-red-600';
                        }
                    }
                    $planText = $member['plan_nombre'] ?? 'N/A';
                    
                    // MODIFICACIÓN: Resaltar el cliente si su ID es el activo
                    $bgClass = ($member['id'] == $active_id) ? 'bg-blue-100' : 'hover:bg-gray-50';
                ?>

                <a href="/SaaSGYM/public/clients?id=<?= htmlspecialchars($member['id']) ?>" 
                   class="block p-4 border-b border-gray-200 <?= $bgClass ?>">
                    
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