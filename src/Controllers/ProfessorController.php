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
        // Lógica para listar professores
        // Exemplo: buscar professores do banco de dados e renderizar a view
        require_once __DIR__ . '/../views/professor/listar.php';
    }
}