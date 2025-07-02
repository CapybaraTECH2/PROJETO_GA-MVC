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


        public function atualizar($id){
    {
        $livroModel = new \App\Models\Livro();
        $livro = $livroModel->findById($id);

         if (!$livro) {
             die("livro não encontrado.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('livro/atualizar.html.twig', [
            'titulo' => 'Editar livro',
            'livro' => $livro,
        ]);

    }
    }

        public function update($id){
    
        $livroModel = new \App\Models\livro();

        $titulo = filter_input(INPUT_POST, 'titulo');
        $autor = filter_input(INPUT_POST, 'autor');
        $editora = filter_input(INPUT_POST, 'editora');
        $ano = filter_input(INPUT_POST, 'ano');
        $local_publicacao = filter_input(INPUT_POST, 'local_publicacao');
        $referencia_bibligrafica = filter_input(INPUT_POST, 'referencia_bibligrafica');

        $ok = $livroModel->update($id, $matricula, $nome, $area, $titulacao, $nomeacao);
        
        if ($ok) {
            header("Location: /livro/lista");
            exit;
        } 
   }

    

    public function confirmarExclusao($id)
    {
        $livroModel = new \App\Models\livro();
        $livro = $livroModel->findById($id);

        if (!$livro) {
            die("livro não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('livro/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'livro' => $livro
        ]);
    }

        public function delete($id)
        {
        $livroModel = new \App\Models\livro();
        $livro = $livroModel->findById($id);

        if (!$livro) {
            die("livro não encontrado.");

        }
        $livroModel ->delete(id: $livro->id); 

            header(header: "Location: /livro/lista");
            exit;
    }
    

    }