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

      public function save($titulo, $autor, $editora, $ano, $local_publicacao, $isbn, $referencia_bibliografica){

        $conn = BD::connect();


        $stmt = $conn->prepare("INSERT INTO livros (tiulo, autor, editora, ano, local_publicacao, referencia_bibligrafica) VALUES (:titulo, :autor, :editora, :ano, :local_publicacao, :referencia_bibliografica)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':editora', $editora);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':local_publicacao', $local_publicacao);
        $stmt->bindParam(':referencia_bibliografica', $referencia_bibliografica);
        
        $stmt->execute();

        return $conn->lastInsertId();
    }
}