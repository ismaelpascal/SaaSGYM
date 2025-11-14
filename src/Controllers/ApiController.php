<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/MemberNote.php';
require_once __DIR__ . '/../Models/Products.php';
require_once __DIR__ . '/../Models/PaymentHistory.php';
require_once __DIR__ . '/../Models/MembershipType.php';
require_once __DIR__ . '/../Models/Sales.php';

class ApiController
{
    public function getMembers()
    {
        $members = Member::findAll();
        header('Content-Type: application/json');
        echo json_encode($members);
    }
    public function getMemberById($id)
    {
        $member = Member::findById((int)$id);
        header('Content-Type: application/json');
        echo json_encode($member);
    }

    public function getProducts()
    {
        $products = Product::findAll();
        header('Content-Type: application/json');
        echo json_encode($products);
    }

    public function getMemberNotesById($memberId)
    {
        $notes = MemberNote::findById((int)$memberId);
        header('Content-Type: application/json');
        echo json_encode($notes);
    }

    public function getMemberPaymentsById($memberId)
    {
        $payments = PaymentHistory::findByMemberId((int)$memberId);
        header('Content-Type: application/json');
        echo json_encode($payments);
    }

    public function getMembershipTypes()
    {
        $plans = MembershipType::findAll();
        header('Content-Type: application/json');
        echo json_encode($plans);
    }
    
    public function getPendingSales()
    {
        $sales = Sales::findPendingWithItems();
        header('Content-Type: application/json');
        echo json_encode($sales);
    }

    public function createMember()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data['nombre']) || empty($data['email'])) {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Faltan campos obligatorios.']);
            return;
        }

        $success = Member::create($data);

        header('Content-Type: application/json');
        if ($success) {
            echo json_encode(['status' => 'success', 'message' => 'Miembro creado con éxito.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'No se pudo crear el miembro (posiblemente email o DNI duplicado).']);
        }
    }

    public function createMemberNote($memberId)
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $noteText = $data['note'] ?? '';

        if (empty($noteText)) {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'La nota no puede estar vacía.']);
            return;
        }

        $adminUserId = 1; 

        $success = MemberNote::create((int)$memberId, $adminUserId, $noteText);

        header('Content-Type: application/json');
        if ($success) {
            echo json_encode(['status' => 'success', 'message' => 'Nota guardada con éxito.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'No se pudo guardar la nota.']);
        }
    }
}