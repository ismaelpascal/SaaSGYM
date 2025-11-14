<?php

require_once __DIR__ . '/../Core/Database.php';

class MembershipType
{
    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
                nombre,
                precio,
                duracion_dias
            FROM
                membership_types
            ORDER BY
                precio ASC
        ";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}