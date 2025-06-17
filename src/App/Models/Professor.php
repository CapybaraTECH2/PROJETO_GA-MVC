<?php
namespace App\Models;

use App\Models\BD;

class Professor{

    public function getAll(){
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM professores");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}