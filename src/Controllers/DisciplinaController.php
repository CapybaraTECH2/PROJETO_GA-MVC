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
        // Lógica para listar disciplinas
        // Exemplo: buscar disciplinas do banco de dados e renderizar a view
        require_once __DIR__ . '/../views/disciplina/listar.php';
    }
}