<?php

namespace App\Models;

use App\Models\BD;  

class Usuario
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
    }
}