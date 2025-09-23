<?php

require_once __DIR__ . '/../Core/Database.php';

class ApiController
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct()
    {
        // Obtener la instancia de la base de datos
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Obtiene y devuelve todos los miembros en formato JSON.
     */
    public function getMembers()
    {
        try {
            // CORRECCIÓN: Se actualizó la consulta para usar la tabla 'members' y las columnas correctas.
            $stmt = $this->db->query("SELECT id, nombre, apellido, email FROM members");
            
            // Obtener todos los resultados
            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Enviar la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode($members);

        } catch (PDOException $e) {
            // Manejo básico de errores
            header('Content-Type: application/json');
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Error al consultar la base de datos: ' . $e->getMessage()]);
        }
    }

    /**
     * Obtiene un miembro específico por su ID.
     */
    public function getMemberById($id)
    {
        try {
            // CORRECCIÓN: Se actualizó la consulta para la tabla 'members'.
            $stmt = $this->db->prepare("SELECT id, nombre, apellido, email FROM members WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);

            header('Content-Type: application/json');
            if ($member) {
                echo json_encode($member);
            } else {
                http_response_code(404); // Not Found
                echo json_encode(['error' => 'Miembro no encontrado.']);
            }
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
        }
    }
}

