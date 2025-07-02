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

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM cursos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

public function save($nome, $descricao, $data_inicio, $habilitacao, $unidade){

        $conn = BD::connect();

        $stmt = $conn->prepare("INSERT INTO cursos (nome, descricao, data_inicio, habilitacao, unidade) VALUES (:nome, :descricao, :data_inicio, :habilitacao, :unidade)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':habilitacao', $habilitacao);
        $stmt->bindParam(':unidade', $unidade);
        $stmt->execute();

        return $conn->lastInsertId();
    }

    public function update($id, $nome, $descricao, $data_inicio, $habilitacao, $unidade)
     {
         $conn = BD::connect();
        
         $curso = $this->findById($id);

         if (!$curso) {
             die("Curso não encontrado.");
         }   

         
             
         $stmt = $conn->prepare("UPDATE cursos SET nome = :nome, descricao = :descricao,  data_inicio = :data_inicio, habilitacao = :habilitacao, unidade = :unidade  WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nome', $nome);
         $stmt->bindParam(':descricao', $descricao);
         $stmt->bindParam(':data_inicio', $data_inicio);
         $stmt->bindParam(':habilitacao', $habilitacao);
         $stmt->bindParam(':unidade', $unidade);
         return $stmt->execute();
     }


    public function delete($id)
    {
        $conn = BD::connect();

        $curso = $this->findById($id);
        if (!$curso) {
            die("Usuário não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM cursos WHERE id = :id");
        $sql->bindValue(param: ":id", value: $curso->id);
        $sql->execute();


        return true;
    }

    
}



