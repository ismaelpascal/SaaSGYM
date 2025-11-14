<?php

require_once __DIR__ . '/../Core/Database.php';

class PaymentHistory
{
    public static function findByMemberId(int $memberId)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
                ph.fecha_pago,
                ph.monto,
                ph.metodo_pago,
                mt.nombre AS plan_nombre
            FROM
                payment_history AS ph
            LEFT JOIN
                memberships AS m ON ph.membership_id = m.id
            LEFT JOIN
                membership_types AS mt ON m.membership_type_id = mt.id
            WHERE
                ph.member_id = :member_id
            ORDER BY
                ph.fecha_pago DESC
        ";

        $stmt = $db->prepare($query);
        $stmt->execute(['member_id' => $memberId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}