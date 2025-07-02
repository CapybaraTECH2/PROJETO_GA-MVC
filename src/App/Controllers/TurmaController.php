<?php

namespace App\Controllers;


class TurmaController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('turma/cadastro.html.twig', [
            'titulo' => 'Cadastro de Turma',
            'mensagem' => 'Preencha os dados da turma',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);
        $turmaModel = new \App\Models\Turma();
        $turmas = $turmaModel->getAll();
        
        echo $twig->render('turma/listar.html.twig', [
            'titulo' => 'Lista de Turmas',
            'turmas' => $turmas,
        ]);

    }

   public function save()
    { 
        $turmaModel = new \App\Models\Turma();  

        $codigo_turma= filter_input(INPUT_POST, 'codigo_turma');
        $periodo = filter_input(INPUT_POST, 'periodo');
        $semestre = filter_input(INPUT_POST, 'semestre');
        $sigla = filter_input(INPUT_POST, 'sigla');
        $sala = filter_input(INPUT_POST, 'sala');
        $dias_aulas = filter_input(INPUT_POST, 'dias_aulas');

         $id = $turmaModel->save($codigo_turma, $periodo, $semestre, $sigla, $sala, $dias_aulas);
        if ($id) {
            header("Location: /usuario/lista");
            exit;
        } else {
            die("Erro ao salvar o usuário. Por favor, tente novamente.");
        }
    }

      
     public function atualizar($id)
     {
         $turmaModel = new \App\Models\Turma();
        $turma = $turmaModel->findById($id);

         if (!$turma) {
             die("Turma não encontrada.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('turma/tualizar.html.twig', [
            'titulo' => 'Editar Turma',
            'turma' => $turma,
        ]);

    }
       
        public function update($id)
    {
        $turmaModel = new \App\Models\Turma();

        $codigo_turma= filter_input(INPUT_POST, 'codigo_turma');
        $periodo = filter_input(INPUT_POST, 'periodo');
        $semestre = filter_input(INPUT_POST, 'semestre');
        $sigla = filter_input(INPUT_POST, 'sigla');
        $sala = filter_input(INPUT_POST, 'sala');
        $dias_aulas = filter_input(INPUT_POST, 'dias_aulas');

         $id = $turmaModel->save($codigo_turma, $periodo, $semestre, $sigla, $sala, $dias_aulas);
        
        if ($ok) {
            header("Location: /turma/lista");
            exit;
        } else {
            die("Erro ao atualizar o Turma. Por favor, tente novamente.");
        }
    }

    public function confirmarExclusao($id)
    {
        $turmaModel = new \App\Models\Turma();
        $turma = $turmaModel->findById($id);

        if (!$turma) {
            die("Turma não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('turma/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'turma' => $turma
        ]);
    }

        public function delete($id)
        {
        $turmaModel = new \App\Models\Turma();
        $turma = $turmaModel->findById($id);

        if (!$turma) {
            die("Turma não encontrada.");

        }
        $turmaModel ->delete(id: $turma->id); 

            header(header: "Location: /turma/lista");
            exit;
        
    }
}

