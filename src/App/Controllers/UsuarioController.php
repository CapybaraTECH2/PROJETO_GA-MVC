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
     
    public function save()
    { 
        $usuarioModel = new \App\Models\Usuario();  

        $nome = filter_input(INPUT_POST, 'nome');
        $e_mail = filter_input(INPUT_POST, 'e_mail');
        $login = filter_input(INPUT_POST, 'login');
        $senha = filter_input(INPUT_POST, 'senha');
        $confirma_senha = filter_input(INPUT_POST, 'confirma_senha');
        $funcao = filter_input(INPUT_POST, 'funcao');

        if ($senha !== $confirma_senha) {
            die("As senhas não coincidem. Por favor, tente novamente.");
        }
      
        $id = $usuarioModel->save($nome, $e_mail, $login, $senha, $funcao);
    
        if ($id) {
            header("Location: /usuario/lista");
            exit;
        } else {
            die("Erro ao salvar o usuário. Por favor, tente novamente.");
        }
    }
  
     public function atualizar($id)
     {
        $usuarioModel = new \App\Models\Usuario();
        $usuario = $usuarioModel->findById($id);

         if (!$usuario) {
             die("Usuário não encontrado.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('usuario/atualizar.html.twig', [
            'titulo' => 'Editar Usuário',
            'usuario' => $usuario,
        ]);

    }

    public function update($id)
    {
        $usuarioModel = new \App\Models\Usuario();

        $nome = filter_input(INPUT_POST, 'nome');
        $e_mail = filter_input(INPUT_POST, 'e_mail');
        $login = filter_input(INPUT_POST, 'login');
        $senha = filter_input(INPUT_POST, 'senha');
        $confirma_senha = filter_input(INPUT_POST, 'confirma_senha');
        $funcao = filter_input(INPUT_POST, 'funcao');

        if(! empty($senha)) {
            if ($senha !== $confirma_senha) {
                die("As senhas não coincidem. Por favor, tente novamente.");
            }        
        }

        $ok = $usuarioModel->update($id, $nome, $e_mail, $login, $funcao, $senha);
        
        if ($ok) {
            header("Location: /usuario/lista");
            exit;
        } else {
            die("Erro ao atualizar o usuário. Por favor, tente novamente.");
        }
    }

    public function confirmarExclusao($id)
    {
        $usuarioModel = new \App\Models\Usuario();
        $usuario = $usuarioModel->findById($id);

        if (!$usuario) {
            die("Usuário não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('usuario/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'usuario' => $usuario
        ]);
    }

        public function delete($id)
    
        {
        $usuarioModel = new \App\Models\Usuario();
        $usuario = $usuarioModel->findById($id);

        if (!$usuario) {
            die("Usuário não encontrado.");

        }
        $usuarioModel ->delete(id: $usuario->id); 

            header(header: "Location: /usuario/lista");
            exit;
        

}
}