<div class="bg-white p-6 rounded-lg border border-gray-200">
    <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Información del Cliente</h3>

<<<<<<< HEAD
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
=======
    <div id="clientInfoPlaceholder">
        <div class="text-sm text-gray-400 grid grid-cols-1 md:grid-cols-2 gap-2">
            <p><strong>Nombre: ***</strong></p>
            <p><strong>DNI: ***</strong></p>

            <p><strong>Email: ***</strong></p>
            <p><strong>Fecha de nacimiento: ***</strong></p>

            <p><strong>Teléfono: ***</strong></p>
            <p><strong>Fecha de registro: ***</strong></p>
        </div>
        <div class="text-sm text-gray-400 grid gap-2 pt-2">
            <p><strong>Contacto de emergencia: ***</strong></p>
            <p><strong>Domicilio: ***</strong></p>
        </div>
    </div>

    <div id="clientInfoData" class="hidden">
        <div class="text-sm grid grid-cols-1 md:grid-cols-2 gap-2">
            <p><strong>Nombre:</strong> <span id="clientInfoNombre"></span></p>
            <p><strong>DNI:</strong> <span id="clientInfoDni"></span></p>

            <p><strong>Email:</strong> <span id="clientInfoEmail"></span></p>
            <p><strong>Fecha de nacimiento:</strong> <span id="clientInfoFecNac"></span></p>

            <p><strong>Teléfono:</strong> <span id="clientInfoTelefono"></span></p>
            <p><strong>Fecha de registro:</strong> <span id="clientInfoFecReg"></span></p>
        </div>
        <div class="text-sm grid gap-2 pt-2">
            <p><strong>Contacto de emergencia:</strong> <span id="clientInfoEmergencia"></span></p>
            <p><strong>Domicilio:</strong> <span id="clientInfoDomicilio"></span></p>
        </div>
    </div>
>>>>>>> error
</div>