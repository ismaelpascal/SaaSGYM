<?php

require_once __DIR__ . '/../Core/Database.php';

class PaymentHistory
{
    /**
     * Busca el historial de pagos de un miembro específico.
     * Basado en tu migración '20250927165026_create_payment_history_table.php'
     */
    public static function findByMemberId(int $memberId)
    {
        $db = Database::getInstance()->getConnection();

        $query = "
            SELECT
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
    }
}