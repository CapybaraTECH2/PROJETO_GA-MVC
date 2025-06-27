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

      public function save()
    { 
        $livroModel = new \App\Models\Livro();  

        $titulo = filter_input(INPUT_POST, 'titulo');
        $autor = filter_input(INPUT_POST, 'autor');
        $editora = filter_input(INPUT_POST, 'editora');
        $ano = filter_input(INPUT_POST, 'ano');
        $local_publicacao = filter_input(INPUT_POST, 'local_publicacao');
        $referencia_bibligrafica = filter_input(INPUT_POST, 'referencia_bibligrafica');

        $id = $livroModel->save($titulo, $autor, $editora, $ano, $local_publicacao, $referencia_bibligrafica );
       
    }

}
 