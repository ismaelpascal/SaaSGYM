<?php

require_once __DIR__ . '/../Core/Database.php';

class Product
{
    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();
        $query = "
            SELECT
                id,
                nombre,
                categoria,
                precio,
                stock
            FROM
                products
            ORDER BY
                nombre ASC
        ";

        try {
            $stmt = $db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en Product::findAll(): " . $e->getMessage());
            return [];
        }
    }
}
