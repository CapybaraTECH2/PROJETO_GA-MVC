<?php

namespace App\Models;
use App\Models\BD;
 
class Grade
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM grades");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
