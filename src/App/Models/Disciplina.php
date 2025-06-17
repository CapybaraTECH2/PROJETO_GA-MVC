<?php

namespace App\Models;
use App\Models\BD;
class Disciplina
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM disciplina");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}