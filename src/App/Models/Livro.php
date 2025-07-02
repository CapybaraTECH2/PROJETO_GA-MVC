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

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM livros WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
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

    public function update($id, $titulo, $autor, $editora, $ano, $local_publicacao, $referencia_bibliografica)
     {
         $conn = BD::connect();
        
         $livro = $this->findById($id);

         if (!$livro) {
             die("livro não encontrado.");
         }       

         $stmt = $conn->prepare("UPDATE livros SET  titulo = :titulo, autor = :autor, editora = :editora, local_publicacao = :local_publicacao, referencia_bibliograficao = :referencia_bibliografica WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':titulo', $titulo);
         $stmt->bindParam(':autor', $autor);
         $stmt->bindParam(':editora', $aditora);
         $stmt->bindParam(':ano', $ano);
         $stmt->bindParam(':local_publicacao', $local_publicacao);
         $stmt->bindParam(':referencia_bibliografica', $referencia_bibliografica);
         return $stmt->execute();
     }

     public function delete($id)
    {
        $conn = BD::connect();

        $livro = $this->findById($id);
        if (!$livro) {
            die("livro não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM livros WHERE id = :id");
        $sql->bindValue(param: ":id", value: $livro->id);
        $sql->execute();


        return true;
    }
}