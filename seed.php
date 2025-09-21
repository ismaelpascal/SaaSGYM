<?php

// 1. Incluir el autoloader de Composer
require 'vendor/autoload.php';

// 2. Crear una instancia de Faker
$faker = Faker\Factory::create('es_ES');

echo "Generando datos de prueba...\n";

// Contenedor para todo el SQL que vamos a generar
$sql = "USE saasgym_db;\n\n";

// --- GENERAR SOCIOS ---
$numero_de_socios = 100;
$sql .= "-- Insertando $numero_de_socios Socios\n";
for ($i = 0; $i < $numero_de_socios; $i++) {
    $nombre = $faker->firstName;
    $apellido = $faker->lastName;
    $dni = $faker->unique()->numerify('########');
    $email = $faker->unique()->safeEmail;
    $telefono = $faker->phoneNumber;
    $fecha_nacimiento = $faker->date('Y-m-d', '2004-01-01');
    $domicilio = $faker->address;
    
    // Escapamos las comillas simples para evitar errores de SQL
    $nombre_escaped = addslashes($nombre);
    $apellido_escaped = addslashes($apellido);
    $domicilio_escaped = addslashes($domicilio);

    $sql .= "INSERT INTO Socios (nombre, apellido, dni, email, telefono, fecha_nacimiento, domicilio) VALUES ('$nombre_escaped', '$apellido_escaped', '$dni', '$email', '$telefono', '$fecha_nacimiento', '$domicilio_escaped');\n";
}

// --- GENERAR PLANES (Estos suelen ser fijos) ---
$sql .= "\n-- Insertando Planes\n";
$sql .= "INSERT INTO Planes (nombre, tipo, duracion_dias, precio) VALUES ('Plan Mensual', 'tiempo', 30, 30000.00);\n";
$sql .= "INSERT INTO Planes (nombre, tipo, duracion_dias, precio) VALUES ('Plan Trimestral', 'tiempo', 90, 85000.00);\n";
$sql .= "INSERT INTO Planes (nombre, tipo, duracion_dias, cantidad_clases, precio) VALUES ('Pase de 10 Clases', 'clases', 180, 10, 25000.00);\n";


// --- GENERAR PRODUCTOS ---
$numero_de_productos = 50;
$sql .= "\n-- Insertando $numero_de_productos Productos\n";
$categorias_producto = ['Bebidas', 'Suplementos', 'Ropa', 'Accesorios'];
for ($i = 0; $i < $numero_de_productos; $i++) {
    // --- LÍNEA CORREGIDA ---
    // Pedimos un array de 3 palabras y las unimos con un espacio.
    $nombre_producto_array = $faker->words(3);
    $nombre_producto = implode(' ', $nombre_producto_array);
    
    $categoria = $faker->randomElement($categorias_producto);
    
    // Hacemos lo mismo para la descripción para máxima compatibilidad.
    $descripcion_array = $faker->words(20);
    $descripcion = implode(' ', $descripcion_array);

    $precio = $faker->randomFloat(2, 800, 25000);
    $stock = $faker->numberBetween(10, 100);

    $nombre_producto_escaped = addslashes($nombre_producto);
    $descripcion_escaped = addslashes($descripcion);

    $sql .= "INSERT INTO Productos (nombre, categoria, descripcion, precio, stock) VALUES ('$nombre_producto_escaped', '$categoria', '$descripcion_escaped', $precio, $stock);\n";
}

// --- GENERAR MEMBRESIAS (Asignar planes a socios) ---
$sql .= "\n-- Insertando Membresias para los socios\n";
for ($i = 1; $i <= $numero_de_socios; $i++) {
    $socio_id = $i;
    $plan_id = $faker->numberBetween(1, 3);
    $fecha_inicio = $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d');
    
    $dias_duracion = 0;
    if ($plan_id == 1) $dias_duracion = 30;
    if ($plan_id == 2) $dias_duracion = 90;
    if ($plan_id == 3) $dias_duracion = 180;
    
    $fecha_vencimiento = date('Y-m-d', strtotime($fecha_inicio . " +$dias_duracion days"));
    
    $estado = (new DateTime() > new DateTime($fecha_vencimiento)) ? 'vencido' : 'activo';

    $sql .= "INSERT INTO Membresias (socio_id, plan_id, fecha_inicio, fecha_vencimiento, estado) VALUES ($socio_id, $plan_id, '$fecha_inicio', '$fecha_vencimiento', '$estado');\n";
}


// 3. Guardar todo el SQL en un archivo
$nombre_archivo = 'datos_de_prueba.sql';
file_put_contents($nombre_archivo, $sql);

echo "¡Listo! Se ha creado el archivo '$nombre_archivo' con todos los datos.\n";
echo "Ahora solo tienes que importarlo en phpMyAdmin.\n";

?>

