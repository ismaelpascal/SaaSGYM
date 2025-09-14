<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'SaaSGYM'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="flex flex-col h-screen bg-gray-50 overflow-hidden">
<header class="bg-white shadow-sm p-4 border-b border-gray-200">
    <div class="flex justify-between items-center">
        
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo $pageTitle ?? 'Dashboard'; ?>
        </h1>

        <div class="flex items-center space-x-6">
            
            <div class="text-center">
                <h3 class="text-xs font-medium text-gray-500">CLIENTES ACTIVOS</h3>
                <p class="mt-1 text-2xl font-semibold text-gray-900">152</p>
            </div>

            <div class="text-center">
                <h3 class="text-xs font-medium text-gray-500">EN GIMNASIO</h3>
                <p class="mt-1 text-2xl font-semibold text-gray-900">23</p>
            </div>

            <div class="text-center">
                <h3 class="text-xs font-medium text-gray-500">CUOTA MENSUAL</h3>
                <p class="mt-1 text-2xl font-semibold text-gray-900">$30,000</p>
            </div>

            <div class="text-center">
                <h3 class="text-xs font-medium text-gray-500">PRÓXIMO AUMENTO</h3>
                <p class="mt-1 text-2xl font-semibold text-gray-900">$35,000</p>
            </div>

            <div class="text-center">
                <h3 class="text-xs font-medium text-gray-500">FECHA AUMENTO</h3>
                <p class="mt-1 text-2xl font-semibold text-gray-900">01/10/25</p>
            </div>

        </div>
    </div>
</header>

