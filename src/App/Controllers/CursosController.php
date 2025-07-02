<?php

namespace App\Controllers;

class CursosController
{
    public function cadastro()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('curso/cadastro.html.twig', [
            'titulo' => 'Cadastro de Curso',
            'mensagem' => 'Preencha os dados de Curso',
        ]);
    }

    public function listar()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $cursoModel = new \App\Models\Curso();
        $curso = $cursoModel->getAll();

        echo $twig->render('curso/listar.html.twig', [
            'titulo' => 'Lista de Cursos',
            'cursos' => $curso,
        ]);
    }
  
    public function save()
    { 
        $cursoModel = new \App\Models\Curso();  

        $nome = filter_input(INPUT_POST, 'nome');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $data_inicio = filter_input(INPUT_POST, 'data_inicio');
        $habilitacao = filter_input(INPUT_POST, 'habilitacao'); 
        $unidade = filter_input(INPUT_POST, 'unidade');

        $id = $cursoModel->save($nome, $descricao, $data_inicio, $habilitacao, $unidade);
        
        header("Location: /curso/lista");
    }

   public function atualizar($id)
     {
        $cursoModel = new \App\Models\Curso();
        $curso = $cursoModel->findById($id);

         if (!$curso) {
             die("curso não encontrado.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('curso/atualizar.html.twig', [
            'titulo' => 'Editar curso',
            'curso' => $curso,
        ]);

    }

   public function update($id)
    {
        $cursoModel = new \App\Models\Curso();

        $nome = filter_input(INPUT_POST, 'nome');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $data_inicio = filter_input(INPUT_POST, 'data_inicio');
        $habilitacao = filter_input(INPUT_POST, 'habilitacao'); 
        $unidade = filter_input(INPUT_POST, 'unidade');

        $ok = $cursoModel->update($id, $nome, $descricao, $data_inicio, $habilitacao, $unidade);
        
        if ($ok) {
            header("Location: /curso/lista");
            exit;
        } 
    }

    public function confirmarExclusao($id)
    {
        $cursoModel = new \App\Models\Curso();
        $curso = $cursoModel->findById($id);

        if (!$curso) {
            die("Curso não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('curso/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'curso' => $curso
        ]);
    }

        public function delete($id)
    
        {
        $cursoModel = new \App\Models\Curso();
        $curso = $cursoModel->findById($id);

        if (!$curso) {
            die("Curso não encontrado.");

        }
        $cursoModel ->delete(id: $curso->id); 

            header(header: "Location: /curso/lista");
            exit;
        

}
}