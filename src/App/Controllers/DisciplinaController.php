<?php

namespace App\Controllers;

class DisciplinaController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('disciplina/cadastro.html.twig', [
            'titulo' => 'Cadastro de Disciplina',
            'mensagem' => 'Preencha os dados da disciplina',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $disciplina = new \App\Models\Disciplina();
        $disciplina = $disciplina->getAll();
        
        echo $twig->render('disciplina/listar.html.twig', [
            'titulo' => 'Lista de Disciplinas',
            'disciplina' => $disciplina,
        ]);
    }
}