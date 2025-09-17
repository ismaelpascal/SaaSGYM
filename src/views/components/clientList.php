<div class="w-1/4 flex flex-col bg-white border-r border-gray-200">
    
    <div class="flex-grow overflow-y-auto">

        <?php include __DIR__ . '/searchBar.php'; ?>
        
        <a href="#" class="block p-4 border-b border-gray-200 hover:bg-gray-50">
            <p class="font-semibold">Juan Pérez</p>
            <p class="text-sm text-gray-500">Plan Mensual - Activo</p>
        </a>

        <a href="#" class="block p-4 border-b border-gray-200 bg-blue-100">
            <p class="font-semibold">Ana García</p>
            <p class="text-sm text-gray-500">Plan Trimestral - Activo</p>
        </a>

        <?php for ($i = 0; $i < 15; $i++): ?>
        <a href="#" class="block p-4 border-b border-gray-200 hover:bg-gray-50">
            <p class="font-semibold">Cliente Ejemplo <?php echo $i+1; ?></p>
            <p class="text-sm text-gray-500">Plan Anual - Vencido</p>
        </a>
        <?php endfor; ?>
    </div>
</div>
