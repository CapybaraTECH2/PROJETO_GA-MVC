<?php

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Inde
get('/', function(){
    $controller = new App\Controllers\AppController();

    $controller->index();
});


//CRUD DISCIPLINA
get('/disciplina/cadastro', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->cadastro();
});

get('/disciplina/lista', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->listar();
});

post('/disciplina/save', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->save();
});

get('/disciplina/atualizar/$id', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->atualizar();
});

post('/disciplina/update/$id', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->update();
});

get('/disciplina/excluir/$id', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->excluir();
});

get('/discipĺinar/delete/$id', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->delete();
});
//FIM CRUD DISCIPLINA

//CRUD TURMA
get('/turma/cadastro', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->cadastro();
});
//FIM CRUD TURMA

//CRUD USUÁRIO
get('/usuario/cadastro', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->cadastro();
});
//FIM CRUD USUÁRIO

//CRUD PROFESSOR
get('/professor/lista', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->listar();
});

get('/professor/cadastro', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->cadastro();
});

post('/professor/save', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->save();
});

get('/professor/atualizar/$id', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->atualizar();
});

post('/professor/update/$id', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->update();
});

get('/professor/excluir/$id', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->excluir();
});

get('/professor/delete/$id', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->delete();
});
//FIM CRUD PROFESSOR

//CRUD LIVROS
get('/livros/cadastro', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->cadastro();
});
//FIM CRUD LIVROS

//CRUD GRADE
get('/grade/cadastro', function(){
    $controller = new App\Controllers\GradeController();

    $controller->cadastro();
});
// FIM CRUD GRADE

//CRUD CURSOS
get('/curso/cadastro', function(){
    $controller = new App\Controllers\CursosController();

    $controller->cadastro();
});
// FIM CRUD CURSOS

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');