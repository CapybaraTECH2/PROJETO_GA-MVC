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

    public function save($ano, $modalidade, $periodicidade_igresso, $turno, $ch_presencial, $ch_distancia, $duracao_maxima, $vagas_ofertadas){

        $conn = BD::connect();
  
        $stmt = $conn->prepare("INSERT INTO grades (ano, modalidade,  periodicidade_igresso, turno, ch__presencial, ch_distancia, duracao_aula, duracao_minima, duracao_maxima, vagas ofertadas) VALUES (:ano, :modalidade, :peridicidade_igresso, :turno, :ch_presencial, :ch_distancia, :duracao_maxima, :vagas_ofertadas)");
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':modalidade', $modalidade);
        $stmt->bindParam(':periodicidade_igresso', $periodicidade_igresso);
        $stmt->bindParam(':turno', $turno);
        $stmt->bindParam(':ch_presencial', $ch_presencial);
        $stmt->bindParam(':ch_distancia', $ch_distancia);
        $stmt->bindParam(':duracao_maxima', $duracao_maxima);
        $stmt->bindParam(':vagas_ofertadas', $vagas_ofertadas);
        $stmt->execute();

        return $conn->lastInsertId();
    }

}
