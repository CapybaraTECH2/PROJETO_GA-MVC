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
            'titulo' => 'Cadastro do Usuário',
            'mensagem' => 'Preencha os dados do usuário',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $usuarioModel = new \App\Models\Usuario();
        $usuarios = $usuarioModel->getAll();
        
        echo $twig->render('usuario/listar.html.twig', [
            'titulo' => 'Lista de Usuários',
            'usuarios' => $usuarios,
        ]);
        
        
       
    }
}