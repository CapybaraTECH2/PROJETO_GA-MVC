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
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $livroModel = new \App\Models\Livro();
        $livros = $livroModel->getAll();

        echo $twig->render('livros/listar.html.twig', [
            'titulo' => 'Lista de Livro',
            'livros' => $livros,
        ]);
    }
}
 