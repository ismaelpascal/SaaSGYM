<?php

require_once __DIR__ . '/../Core/Database.php';

class MemberNote
{
    public static function findById(int $memberId)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
                id,
                note,
                created_at
            FROM
                member_notes
            WHERE
                member_id = :member_id
            ORDER BY
                created_at DESC
        ";

        $stmt = $db->prepare($query);
        $stmt->execute(['member_id' => $memberId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
