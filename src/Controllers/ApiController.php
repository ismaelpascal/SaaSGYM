<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/MemberNote.php';
require_once __DIR__ . '/../Models/Products.php';

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
}

