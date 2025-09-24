<?php

require_once __DIR__ . '/../Core/Database.php';

/**
 * Clase Member
 * Se encarga de toda la lógica de base de datos relacionada con los miembros.
 */
class Member
{
    /**
     * Busca y devuelve TODOS los miembros con la información de su plan actual.
     *
     * @return array
     */
    public static function findAll()
    {
        $db = Database::getInstance()->getConnection();

        // CONSULTA FINAL: Ajustada a los nombres exactos de tus tablas y columnas.
        // Unimos `members` con `memberships` usando `member_id`.
        // Y `memberships` con `membership_types` usando `membership_type_id`.
        $query = "
            SELECT
                m.id,
                m.nombre,
                m.apellido,
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

        try {
            // Usamos query() porque no hay parámetros de usuario, es más directo.
            $stmt = $db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En caso de un error en la base de datos, lo registramos y devolvemos un array vacío.
            error_log("Error en Member::findAll(): " . $e->getMessage());
            return [];
        }
    }
}

