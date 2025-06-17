<?php

namespace App\Controllers;

class AppController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('index.html.twig', [
            'titulo' => 'Sistema de Geatão Acadêmica',
            'mensagem' => 'Este é o sistema de gerenciamento academico.',
        ]);
    }
}