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
}