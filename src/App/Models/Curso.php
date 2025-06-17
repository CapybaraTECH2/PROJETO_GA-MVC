<?php

namespace App\Models;
use App\Models\BD;
 
class Curso
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM cursos");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}