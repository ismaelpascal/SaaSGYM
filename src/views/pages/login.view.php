<?php
$pageTitle = 'Iniciar Sesión';
include __DIR__ . '/../layouts/loginHeader.php';?>

    <main class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-6 bg-white p-8 border border-gray-300 rounded-lg">
        <div>
            <h2 class="text-center text-2xl font-bold text-gray-900">
                SaaS GYM - Iniciar Sesión
            </h2>
        </div>
        <form class="space-y-4" action="/SaaSGYM/public/clients" method="GET">
            <div>
                <label for="user" class="sr-only">Usuario</label>
                <input id="user" name="user" type="text" required class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-black rounded-md sm:text-sm" placeholder="Usuario">
            </div>
            <div>
                <label for="password" class="sr-only">Contraseña</label>
                <input id="password" name="password" type="password" required class="block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-black rounded-md sm:text-sm" placeholder="Contraseña">
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600">
                    Ingresar
                </button>
            </div>
        </form>
    </div>
    </main>

<?php include __DIR__ . '/../layouts/footer.php';?>
