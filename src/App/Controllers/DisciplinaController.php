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
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        $disciplina = new \App\Models\Disciplina();
        $disciplina = $disciplina->getAll();
        
        echo $twig->render('disciplina/listar.html.twig', [
            'titulo' => 'Lista de Disciplinas',
            'disciplinas' => $disciplina,
        ]);
    }

    public function save()
    { 
        $disciplinaModel = new \App\Models\Disciplina();  

        $nome = filter_input(INPUT_POST, 'nome');
        $periodo = filter_input(INPUT_POST, 'periodo');
        $carga_horaria_total = filter_input(INPUT_POST, 'carga_horaria_total');
        $carga_horaria_semanal = filter_input(INPUT_POST, 'carga_horaria_semanal');
        $bibliografia_basica = filter_input(INPUT_POST, 'bibliografia_basica');
        $bibliografia_complementar = filter_input(INPUT_POST, 'bibliografia_complementar');

        $id = $disciplinaModel->save($nome, $periodo, $carga_horaria_total, $carga_horaria_semanal, $bibliografia_basica, $bibliografia_complementar);
        
       
        
    }


    public function atualizar($id)
     {
        $disciplinaModel = new \App\Models\Disciplina();
        $disciplina = $disciplinaModel->findById($id);

         if (!$disciplina) {
             die("disciplina não encontrada.");
         }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('disciplina/atualizar.html.twig', [
            'titulo' => 'Editar disciplina',
            'disciplina' => $disciplina,
        ]);

    }

    public function update($id)
    {
        $disciplinaModel = new \App\Models\Disciplina();

        $nome = filter_input(INPUT_POST, 'nome');
        $periodo = filter_input(INPUT_POST, 'periodo');
        $carga_horaria_total = filter_input(INPUT_POST, 'carga_horaria_total');
        $carga_horaria_semanal = filter_input(INPUT_POST, 'carga_horaria_semanal');
        $bibliografia_basica = filter_input(INPUT_POST, 'bibliografia_basica');
        $bibliografia_complementar = filter_input(INPUT_POST, 'bibliografia_complementar');

        $ok = $disciplinaModel->update($id, $nome, $periodo, $carga_horaria_total, $carga_horaria_semanal, $bibliografia_basica, $bibliografia_complementar);
        
        if ($ok) {
            header("Location: /disciplina/lista");
            exit;
        } 
    }

     public function confirmarExclusao($id)
    {
        $disciplinaModel = new \App\Models\Disciplina();
        $disciplina = $disciplinaModel->findById($id);

        if (!$disciplina) {
            die("Disciplina não encontrado.");
        }

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, // Desativar cache para desenvolvimento
        ]);

        echo $twig->render('disciplina/excluir.html.twig', [
            'titulo' => 'Confirmar Exclusão',
            'disciplina' => $disciplina
        ]);
    }

        public function delete($id)
    
        {
        $disciplinaModel = new \App\Models\Disciplina();
        $disciplina = $disciplinaModel->findById($id);

        if (!$disciplina) {
            die("Disciplina não encontrado.");

        }
        $disciplinaModel ->delete(id: $disciplina->id); 

            header(header: "Location: /disciplina/lista");
            exit;
        

}
}