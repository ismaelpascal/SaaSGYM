<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Member.php';

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
        header('Content-Type: application/json');
        $products = Product::findAll();
        echo json_encode($products);
    }
}

