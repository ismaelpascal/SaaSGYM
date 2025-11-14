<?php

require_once __DIR__ . '/../Core/Database.php';

class PaymentHistory
{
<<<<<<< HEAD
    /**
     * Busca el historial de pagos de un miembro específico.
     * Basado en tu migración '20250927165026_create_payment_history_table.php'
     */
=======
>>>>>>> error
    public static function findByMemberId(int $memberId)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
<<<<<<< HEAD
                monto,
                metodo_pago,
                fecha_pago
            FROM
                payment_history
            WHERE
                member_id = :member_id
            ORDER BY
                fecha_pago DESC
        ";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute(['member_id' => $memberId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en PaymentHistory::findByMemberId(): " . $e->getMessage());
            return [];
        }
=======
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
>>>>>>> error
    }
}