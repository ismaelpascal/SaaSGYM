<?php

require_once __DIR__ . '/../Core/Database.php';

class LoginModels
{
    public static function findByUsername($username)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT * FROM
                users
            WHERE
                nombre = :username";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute(['username' => $username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en User::findByUsername(): " . $e->getMessage());
            return false;
        }
    }
}
