<?php

namespace App\Models;

use App\Models\BD;  
 
class Turma
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM turmas");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}