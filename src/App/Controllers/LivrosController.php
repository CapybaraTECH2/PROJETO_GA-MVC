<?php

namespace App\Controllers;

class LivrosController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('livros/cadastro.html.twig', [
            'titulo' => 'Cadastro de Livros',
            'mensagem' => 'Preencha os dados da disciplina',
        ]);
    }

    public function listar()
    {
        // Lógica para listar livros
        // Exemplo: buscar livros do banco de dados e renderizar a view
        require_once __DIR__ . '/../views/livros/listar.php';
    }
}
 