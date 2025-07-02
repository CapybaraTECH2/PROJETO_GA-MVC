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

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM grades WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function save($ano, $modalidade, $periodicidade_igresso, $turno, $ch_presencial, $ch_distancia, $duracao_minima, $duracao_maxima, $vagas_ofertadas){

        $conn = BD::connect();
  
        $stmt = $conn->prepare("INSERT INTO grades (ano, modalidade,  periodicidade_igresso, turno, ch__presencial, ch_distancia, duracao_aula, duracao_minima, duracao_maxima, vagas ofertadas) VALUES (:ano, :modalidade, :peridicidade_igresso, :turno, :ch_presencial, :ch_distancia, :duracao_maxima, :vagas_ofertadas)");
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':modalidade', $modalidade);
        $stmt->bindParam(':periodicidade_igresso', $periodicidade_igresso);
        $stmt->bindParam(':turno', $turno);
        $stmt->bindParam(':ch_presencial', $ch_presencial);
        $stmt->bindParam(':ch_distancia', $ch_distancia);
        $stmt->bindParam(':duracao_minima', $duracao_minima);
        $stmt->bindParam(':duracao_maxima', $duracao_maxima);
        $stmt->bindParam(':vagas_ofertadas', $vagas_ofertadas);
        $stmt->execute();

        return $conn->lastInsertId();
    }

    public function update($id, $nome, $email, $login, $funcao, $senha = null)
     {
         $conn = BD::connect();
        
         $grade = $this->findById($id);

         if (!$grade) {
             die("Grade não encontrado.");
         }

        
         $stmt = $conn->prepare("UPDATE grades SET ano = :ano, modalidade = :madalidade, periodicidade_igresso = :periodicidade_igresso, turno = :turno, ch_presencial = :ch_presencial, ch_distancia = :ch_distancia, duracao_minima = :duracao_minima, duracao_maxima = :duracao_maxima, vagas_ofertadas = :vagas_ofertadas  WHERE id = :id");
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':modalidade', $modalidade);
        $stmt->bindParam(':periodicidade_igresso', $periodicidade_igresso);
        $stmt->bindParam(':turno', $turno);
        $stmt->bindParam(':ch_presencial', $ch_presencial);
        $stmt->bindParam(':ch_distancia', $ch_distancia);
        $stmt->bindParam(':duracao_minima', $duracao_minima);
        $stmt->bindParam(':duracao_maxima', $duracao_maxima);
        $stmt->bindParam(':vagas_ofertadas', $vagas_ofertadas);
        $stmt->execute();
     }

    public function delete($id)
    {
        $conn = BD::connect();

        $grade = $this->findById($id);
        if (!$grade) {
            die("Usuário não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM grades WHERE id = :id");
        $sql->bindValue(param: ":id", value: $grade->id);
        $sql->execute();


        return true;
    }
}
