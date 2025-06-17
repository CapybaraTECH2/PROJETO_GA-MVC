<?php

namespace App\Controllers;


class UsuarioController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('usuario/cadastro.html.twig', [
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

        
        echo $twig->render('usuario/listar.html.twig', [
            'titulo' => 'Listagem de Usários',
            'mensagem' => 'Aqui estão as usuarios cadastrados',
        ]);
    }
}