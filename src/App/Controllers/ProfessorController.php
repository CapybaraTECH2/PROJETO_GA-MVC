<?php

namespace App\Controllers;

class ProfessorController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('professor/cadastro.html.twig', [
            'titulo' => 'Cadastro de Professor',
            'mensagem' => 'Preencha os dados do professor',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $professorModel = new \App\Models\Professor();
        $professores = $professorModel->getAll();

        echo $twig->render('professor/listar.html.twig', [
            'titulo' => 'Cadastro de Professor',
            'professores' => $professores,
        ]);
    }

    public function save()
    { 
        $professorModel = new \App\Models\Professor();  

        $matricula = filter_input(INPUT_POST, 'matricula');
        $nome= filter_input(INPUT_POST, 'nome');
        $area = filter_input(INPUT_POST, 'area');
        $titulacao = filter_input(INPUT_POST, 'titulacao');
        $nomeacao = filter_input(INPUT_POST, 'nomemacao');

        $id = $professorModel->save($matricula, $nome, $area, $titulacao, $nomeacao);
       
    }

    public function atualizar($id)
     {
        $professorModel = new \App\Models\Professor();
        $professor = $professorModel->findById($id);

         if (!$professor) {
             die("professor não encontrado.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('professor/atualizar.html.twig', [
            'titulo' => 'Editar professor',
            'professor' => $professor,
        ]);

    }

   public function update($id)
    {
        $professorModel = new \App\Models\Professor();

        $matricula = filter_input(INPUT_POST, 'matricula');
        $nome = filter_input(INPUT_POST, 'nome');
        $area = filter_input(INPUT_POST, 'area');
        $titulacao = filter_input(INPUT_POST, 'titulacao'); 
        $nomeacao = filter_input(INPUT_POST, 'nomemacao');

        $ok = $professorModel->update($id, $matricula, $nome, $area, $titulacao, $nomeacao);
        
        if ($ok) {
            header("Location: /professor/lista");
            exit;
        } 
    }

}