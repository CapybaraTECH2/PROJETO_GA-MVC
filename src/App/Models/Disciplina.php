<?php

namespace App\Models;
use App\Models\BD;
class Disciplina
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT d.*, g.ano as grade_ano FROM disciplina AS d JOIN grades AS g ON d.grade_id = g.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM disciplina WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

     public function save($nome, $periodo, $carga_horaria_total, $carga_horaria_semanal, $bibliogafia_basica, $bibliogafia_complemantar){

        $conn = BD::connect();
  
        $stmt = $conn->prepare("INSERT INTO disciplina (nome, periodo,  carga_horaria_total, carga_horaria_semanal, bibliografia_basica, bibliografia_complemantar) VALUES (:nome, :periodo,  :carga_horaria_total, :carga_horaria_semanal, :bibliografia_basica, :bibliografia_complemantar)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':carga_horaria_total', $carga_horaria_total);
        $stmt->bindParam(':carga_horaria_semanal', $carga_horaria_semanal);
        $stmt->bindParam(':bibliografia_basica', $bibliogafia_basica);
        $stmt->bindParam(':bibliografia_complemantar', $bibliogafia_complemantar);
        $stmt->execute();

        return $conn->lastInsertId();
    }

    public function update($id, $nome, $periodo, $carga_horaria_total, $carga_horaria_semanal, $bibliografia_basica, $bibliografia_complemantar)
     {
         $conn = BD::connect();
        
         $disciplina = $this->findById($id);

         if (!$disciplina) {
             die("Disciplina não encontrada.");
         }   

             
         $stmt = $conn->prepare("UPDATE disciplina SET nome = :nome, periodo = :perido,  carga_horaria_total = :carga_horaria_total, carga_horaria_semanal = :carga_horaria_semanal, bibliografia_basica = :bibliografia_basica, bibliografia_complemnetar = :bibliografia_complementar  WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nome', $nome);
         $stmt->bindParam(':perido', $periodo);
         $stmt->bindParam(':carga_horaria_total', $carga_horaria_total);
         $stmt->bindParam(':carga_horaria_semanal', $carga_horaria_semanal);
         $stmt->bindParam(':bibliografia_basica', $bibliogafia_basica);
            $stmt->bindParam(':bibliografia_complementar', $bibliogafia_complemantar);
         return $stmt->execute();
     }

}