<div class="bg-white p-6 rounded-lg border border-gray-200">
    <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Información del Cliente</h3>

    <?php if (isset($selected_member) && $selected_member): ?>
        <div class="text-sm grid grid-cols-1 md:grid-cols-2 gap-2">
            <p><strong>Nombre:</strong> <?= htmlspecialchars($selected_member['nombre'] . ' ' . $selected_member['apellido']) ?></p>
            <p><strong>DNI:</strong> <?= htmlspecialchars($selected_member['dni'] ?? 'N/A') ?></p>

            <p><strong>Email:</strong> <?= htmlspecialchars($selected_member['email'] ?? 'N/A') ?></p>
            <p><strong>Fecha de nacimiento:</strong> <?= htmlspecialchars(date('d/m/Y', strtotime($selected_member['fecha_nacimiento']))) ?> </p>

            <p><strong>Teléfono:</strong> <?= htmlspecialchars($selected_member['telefono'] ?? 'N/A') ?></p>
            <p><strong>Fecha de registro:</strong> <?= htmlspecialchars(date('d/m/Y', strtotime($selected_member['fecha_registro']))) ?></p>
        </div>
        <div class="text-sm grid gap-2 pt-2">
            <p><strong>Contacto de emergencia:</strong> <?= htmlspecialchars($selected_member['contacto_emergencia'] ?? 'N/A') ?></p>
            <p><strong>Domicilio:</strong> <?= htmlspecialchars($selected_member['domicilio'] ?? 'N/A') ?></p>
        </div>
    <?php else: ?>
        <p class="text-gray-500">Selecciona un cliente de la lista para ver su información.</p>
    <?php endif; ?>
</div>