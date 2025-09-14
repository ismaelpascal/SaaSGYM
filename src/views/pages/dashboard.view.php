<?php include __DIR__ . '/../layouts/header.php';?>

<div class="flex h-screen">
    
<?php include __DIR__ . '/../components/sidebar.php';?>

    <main class="flex-grow p-8">
            <h1 class="text-3xl font-bold text-gray-800">¡Bienvenido al Dashboard!</h1>
            <p class="mt-2 text-gray-600">Este es el contenido principal de la página, que ahora aparece a la derecha de la barra lateral.</p>            
            <a href="/SaaSGYM/public/login" class="mt-6 inline-block bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">
                Volver al Login
            </a>
        </main>
</div>

<?php include __DIR__ . '/../layouts/footer.php';?>
