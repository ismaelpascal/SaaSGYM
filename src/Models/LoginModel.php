<?php

require_once __DIR__ . '/../Core/Database.php';

class LoginModel
{
    public static function findByUsername($username)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT * FROM
                users
            WHERE
                nombre = :username";

        $stmt = $db->prepare($query);
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
