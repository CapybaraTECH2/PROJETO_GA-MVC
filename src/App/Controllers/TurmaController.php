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
}