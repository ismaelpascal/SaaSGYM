<?php

require_once __DIR__ . '/../Core/Database.php';

class Member
{
    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
                m.id,
                m.nombre,
                m.apellido,
                m.email,
                m.dni,
                m.telefono,
                m.fecha_nacimiento,
                m.contacto_emergencia,
                m.domicilio,
                m.created_at,
                mt.nombre AS plan_nombre,
                ms.estado
            FROM
                members AS m
            LEFT JOIN
                memberships AS ms ON m.id = ms.member_id
            LEFT JOIN
                membership_types AS mt ON ms.membership_type_id = mt.id
            ORDER BY
                m.apellido, m.nombre
        ";

            $stmt = $db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findById($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
                m.id,
                m.nombre,
                m.apellido,
                m.email,
                m.dni,
                m.fecha_nacimiento,
                m.telefono,
                m.contacto_emergencia,
                m.domicilio,
                m.created_at AS fecha_registro,
                mt.nombre AS plan_nombre,
                ms.fecha_vencimiento
            FROM
                members AS m
            LEFT JOIN
                memberships AS ms ON m.id = ms.member_id AND ms.estado = 'activo'
            LEFT JOIN
                membership_types AS mt ON ms.membership_type_id = mt.id
            WHERE
                m.id = :id
            LIMIT 1
        ";

        $stmt = $db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function create(array $data)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            INSERT INTO members 
                (nombre, apellido, email, dni, telefono, fecha_nacimiento, contacto_emergencia, domicilio, created_at, updated_at)
            VALUES 
                (:nombre, :apellido, :email, :dni, :telefono, :fecha_nacimiento, :contacto_emergencia, :domicilio, NOW(), NOW())
        ";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute([
                ':nombre' => $data['nombre'],
                ':apellido' => $data['apellido'],
                ':email' => $data['email'],
                ':dni' => $data['dni'],
                ':telefono' => $data['telefono'],
                ':fecha_nacimiento' => $data['fecha_nacimiento'],
                ':contacto_emergencia' => !empty($data['contacto_emergencia']) ? $data['contacto_emergencia'] : null,
                ':domicilio' => !empty($data['domicilio']) ? $data['domicilio'] : null,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Error en Member::create(): " . $e->getMessage());
            return false;
        }
    }
}

