<?php

namespace App\Models;

use App\Models\BD;

class Livro
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM livros");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}