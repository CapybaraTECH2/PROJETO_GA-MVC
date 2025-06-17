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
        $professor = $professorModel->getAll();

        echo $twig->render('professor/listar.html.twig', [
            'titulo' => 'Cadastro de Professor',
            'professor' => $professor,
        ]);
    }
}