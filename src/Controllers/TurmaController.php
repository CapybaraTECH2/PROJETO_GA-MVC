<?php

namespace App\Controllers;


class TurmaController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('turma/cadastro.html.twig', [
            'titulo' => 'Cadastro de Turma',
            'mensagem' => 'Preencha os dados da turma',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        ##MODEL TURMA => BUSCAR AS TURMAS NO BANCO DE DADOS

        
        echo $twig->render('turma/listar.html.twig', [
            'titulo' => 'Listagem de Turmas',
            'mensagem' => 'Aqui estão as turmas cadastradas',
        ]);
    }
}