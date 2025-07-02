<?php

namespace App\Controllers;

class GradeController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('grade/cadastro.html.twig', [
            'titulo' => 'Cadastro de Grade',
            'mensagem' => 'Preencha os dados de grade',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $gradeModel = new \App\Models\Grade();
        $grade = $gradeModel->getAll();

        echo $twig->render('grade/listar.html.twig', [
            'titulo' => 'Lista de Grades',
            'grades' => $grade,
        ]);
       }

        public function save()
    { 
        $gradeModel = new \App\Models\Grade();  

         $ano = filter_input(INPUT_POST, 'ano');
        $modalidade = filter_input(INPUT_POST, 'modalidade');
        $periodicidade_igresso = filter_input(INPUT_POST, 'periodicidade_igresso');
        $turno = filter_input(INPUT_POST, 'turno');
        $ch_presencial = filter_input(INPUT_POST, 'ch_presencial');
        $ch_distancia = filter_input(INPUT_POST, 'ch_distancia');
        $duracao_aula = filter_input(INPUT_POST, 'duracao_aula');
        $duracao_minima = filter_input(INPUT_POST, 'duracao_minima');
        $duracao_maxima = filter_input(INPUT_POST, 'duracao_maxima');
        $vagas_ofertadas = filter_input(INPUT_POST, 'vagas_ofertadas');

        $id = $gradeModel->save($ano, $modalidade, $periodicidade_igresso, $turno, $ch_presencial, $ch_distancia, $duracao_aula, $duracao_minima, $duracao_maxima, $vagas_ofertadas); 
        
    }

     public function atualizar($id)
     {
        $gradeModel = new \App\Models\grade();
        $grade = $gradeModel->findById($id);

         if (!$grade) {
             die("Usuário não encontrado.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('grade/atualizar.html.twig', [
            'titulo' => 'Editar Usuário',
            'grade' => $grade,
        ]);

    }

    public function update($id)
    {
        $gradeModel = new \App\Models\Grade();

        $ano = filter_input(INPUT_POST, 'ano');
        $modalidade = filter_input(INPUT_POST, 'modalidade');
        $periodicidade_igresso = filter_input(INPUT_POST, 'periodicidade_igresso');
        $turno = filter_input(INPUT_POST, 'turno');
        $ch_distancia = filter_input(INPUT_POST, 'ch_distancia');
        $duracao_aula = filter_input(INPUT_POST, 'duracao_aula');
         $duracao_minima = filter_input(INPUT_POST, 'duracao_minima');
        $duracao_maxima = filter_input(INPUT_POST, 'duracao_maxima');
        $vagas_ofertadas = filter_input(INPUT_POST, 'vagas_ofertadas');

    

        $ok = $gradeModel->update($id, $ano, $modalidade, $periodicidade_igresso, $turno, $ch_distancia, $duracao_aula, $duracao_minima, $duracao_maxima, $vagas_ofertadas);
        
        if ($ok) {
            header("Location: /grade/lista");
            exit;
        } else {
            die("Erro ao atualizar o Grade. Por favor, tente novamente.");
        }
    }

    public function confirmarExclusao($id)
    {
        $gradeModel = new \App\Models\Graderade();
        $grade = $gradeModel->findById($id);

        if (!$grade) {
            die("Usuário não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('grade/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'grade' => $grade
        ]);
    }

        public function delete($id)
    
        {
        $gradeModel = new \App\Models\Grade();
        $grade = $gradeModel->findById($id);

        if (!$grade) {
            die("Usuário não encontrado.");

        }
        $gradeModel ->delete(id: $grade->id); 

            header(header: "Location: /grade/lista");
            exit;
        

}

}



      