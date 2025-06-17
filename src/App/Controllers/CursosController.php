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
        // Lógica para listar cursos
        // Exemplo: buscar cursos do banco de dados e renderizar a view
        require_once __DIR__ . '/../views/curso/listar.php';
    }
}