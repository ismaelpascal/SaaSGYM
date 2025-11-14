<div id="noteHistoryModal" class="hidden ...">
    <div class="bg-white p-8 rounded-lg ...">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Historial de Notas</h3>
            <button id="closeNoteHistoryBtn" ...>&times;</button>
        </div>

<<<<<<< HEAD
        <div class="space-y-4 max-h-96 overflow-y-auto">
            
            <?php if (isset($member_notes) && !empty($member_notes)): ?>
                <?php foreach ($member_notes as $note): ?>
                    <div class="p-4 border rounded-lg flex justify-between items-start">
                        <div>
                            <p class="text-gray-700"><?= htmlspecialchars($note['note']) ?></p>
                            <span class="text-xs text-gray-400"><?= htmlspecialchars(date('d/m/Y', strtotime($note['created_at']))) ?> - Admin</span>
                        </div>
                        <div class="flex items-center space-x-2 flex-shrink-0 ml-4">
                            <button title="Visible para el cliente" class="text-green-500 hover:text-green-700">👁️‍🗨️0</button>
                            <button class="text-gray-500 hover:text-blue-600">Editar</button>
                            <button class="text-gray-500 hover:text-red-600">Eliminar</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php elseif (isset($selected_member)): ?>
                <p class="text-gray-500">Este cliente no tiene notas registradas.</p>
            
            <?php else: ?>
                <p class="text-gray-500">Selecciona un cliente para ver su historial de notas.</p>
            <?php endif; ?>

=======
        <div id="noteHistoryList" class="space-y-4 max-h-96 overflow-y-auto">
            <div id="noteHistoryPlaceholder">
                <p class="text-gray-500">Selecciona un cliente para ver sus notas.</p>
            </div>
>>>>>>> error
        </div>

    </div>
</div>