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

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM professores WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

public function save($matricula, $nome, $area, $titulacao, $nomeacao){

        $conn = BD::connect();

        $stmt = $conn->prepare("INSERT INTO professores (matricula, nome, area, titulacao, nomeacao) VALUES (:matricula, :nome, :area, :titulacao, :nomeacao)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':titulacao', $titulacao);
        $stmt->bindParam(':nomeacao', $nomeacao);
       
        $stmt->execute();

        return $conn->lastInsertId();
    }

    public function update($id, $matricula, $nome, $area, $titulacao, $nomeacao)
     {
         $conn = BD::connect();
        
         $professor = $this->findById($id);

         if (!$professor) {
             die("professor não encontrado.");
         }       

         $stmt = $conn->prepare("UPDATE professores SET  matricula = :matricula, nome = :nome, area = :area, titulacao = :titulacao, nomeacao = :nomeacao WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':matricula', $matricula);
         $stmt->bindParam(':nome', $nome);
         $stmt->bindParam(':area', $area);
         $stmt->bindParam(':titulacao', $titulacao);
         $stmt->bindParam(':nomeacao', $nomeacao);
         return $stmt->execute();
     }

     public function delete($id)
    {
        $conn = BD::connect();

        $professor = $this->findById($id);
        if (!$professor) {
            die("Usuário não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM professores WHERE id = :id");
        $sql->bindValue(param: ":id", value: $professor->id);
        $sql->execute();


        return true;
    }


}