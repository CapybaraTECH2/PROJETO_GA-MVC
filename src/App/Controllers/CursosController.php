<?php

namespace App\Controllers;

class CursosController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('curso/cadastro.html.twig', [
            'titulo' => 'Cadastro de Curso',
            'mensagem' => 'Preencha os dados de Curso',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $cursoModel = new \App\Models\Curso();
        $curso = $cursoModel->getAll();

        echo $twig->render('curso/listar.html.twig', [
            'titulo' => 'Lista de Cursos',
            'cursos' => $curso,
        ]);
    }
    
}