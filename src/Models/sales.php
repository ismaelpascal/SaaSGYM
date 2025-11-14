<?php

require_once __DIR__ . '/../Core/Database.php';

class Sales
{
    public static function findPendingWithItems()
    {
        $db = Database::getInstance()->getConnection();
        
        $salesQuery = "
            SELECT 
                s.id, 
                s.fecha_venta, 
                s.total, 
                m.nombre, 
                m.apellido, 
                m.email
            FROM sales AS s
            LEFT JOIN members AS m ON s.member_id = m.id
            WHERE s.estado = 'pendiente_retiro'
            ORDER BY s.fecha_venta DESC
        ";
        $salesStmt = $db->query($salesQuery);
        $sales = $salesStmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($sales)) {
            return [];
        }

        $saleIds = array_map(fn($s) => $s['id'], $sales);
        $placeholders = implode(',', array_fill(0, count($saleIds), '?'));

        $itemsQuery = "
            SELECT 
                si.sale_id, 
                si.cantidad, 
                si.precio_unitario, 
                p.nombre AS producto_nombre
            FROM sale_items AS si
            JOIN products AS p ON si.product_id = p.id
            WHERE si.sale_id IN ($placeholders)
        ";
        $itemsStmt = $db->prepare($itemsQuery);
        $itemsStmt->execute($saleIds);
        $items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);

        $itemsBySaleId = [];
        foreach ($items as $item) {
            $itemsBySaleId[$item['sale_id']][] = $item;
        }

        foreach ($sales as $key => $sale) {
            $sales[$key]['items'] = $itemsBySaleId[$sale['id']] ?? [];
        }
        
        return $sales;
    }
}