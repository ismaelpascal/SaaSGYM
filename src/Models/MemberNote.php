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

    public static function create(int $memberId, int $userId, string $noteText)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            INSERT INTO member_notes
                (member_id, user_id, note, created_at, updated_at)
            VALUES 
                (:member_id, :user_id, :note, NOW(), NOW())
        ";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute([
                ':member_id' => $memberId,
                ':user_id' => $userId,
                ':note' => $noteText,
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Error en MemberNote::create(): " . $e->getMessage());
            return false;
        }
    }
}
