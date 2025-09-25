<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Member.php';

class ApiController
{
    public function getMembers()
    {
        try {
            // AHORA LLAMAMOS AL MODELO, LA LÓGICA DE BD YA NO ESTÁ AQUÍ
            $members = Member::findAll();

            // Enviar la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode($members);

        } catch (Exception $e) {
            // Manejo básico de errores
            header('Content-Type: application/json');
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);
        }
    }

    public function getMemberById($id)
    {
        // ... por ahora, esta lógica puede quedarse aquí, pero lo ideal
        // sería tener una función Member::findById($id) en el modelo.
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT id, nombre, apellido, email FROM members WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            if ($member) {
                echo json_encode($member);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Miembro no encontrado.']);
            }
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
        }
    }
    public function getProducts()
    {
        header('Content-Type: application/json');
        $products = Product::findAll();
        echo json_encode($products);
    }
}

