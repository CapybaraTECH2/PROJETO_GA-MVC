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

     public function save($codigo_turma, $periodo, $semestre, $sigla, $sala, $dias_aulas){

        $conn = BD::connect();
 
        $stmt = $conn->prepare("INSERT INTO turmas (codigo_turma, periodo, semestre, sigla, sala, dias_aulas) VALUES (:codigo_turma, :periodo, :semestre, :sigla, :sala, :dias_aulas)");
        $stmt->bindParam(':codigo_turma', $codigo_turma);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':semestre', $semestre);
        $stmt->bindParam(':sigla', $sigla);
        $stmt->bindParam(':sala', $sala);
        $stmt->bindParam(':dias_aulas', $dias_aulas);
        $stmt->execute();

        return $conn->lastInsertId();

    }


     public function update($codigo_turma, $periodo, $semestre, $sigla, $sala, $dias_aulas)
     {
         $conn = BD::connect();
        
         $turma = $this->findById($id);

         if (!$turma) {
             die("Turma não encontrada.");
         }

         $stmt = $conn->prepare("INSERT INTO turmas (:codigo_turma, :periodo, :semestre, :sigla, :sala, :dias_aulas, WHERE id = :id");
        $stmt->bindParam(':codigo_turma', $codigo_turma);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':semestre', $semestre);
        $stmt->bindParam(':sigla', $sigla);
        $stmt->bindParam(':sala', $sala);
        $stmt->bindParam(':dias_aulas', $dias_aulas);
        $stmt->execute();
     }

    public function delete($id)
    {
        $conn = BD::connect();

        $turma = $this->findById($id);
        if (!$turma) {
            die("Usuário não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM turmas WHERE id = :id");
        $sql->bindValue(param: ":id", value: $turma->id);
        $sql->execute();


        return true;
    }

}