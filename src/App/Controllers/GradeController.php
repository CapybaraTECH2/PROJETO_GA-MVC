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
        // Lógica para listar grades
        // Exemplo: buscar grade do banco de dados e renderizar a view
        require_once __DIR__ . '/../views/grade/listar.php';
    }
}