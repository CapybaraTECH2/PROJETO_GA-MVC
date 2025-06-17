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

get('/discipĺina/delete/$id', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->delete();
});
//FIM CRUD DISCIPLINA

//CRUD TURMA
get('/turma/cadastro', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->cadastro();
});

get('/turma/lista', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->listar();
});

post('/turma/save', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->save();
});

get('/turma/atualizar/$id', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->atualizar();
});

post('/turma/update/$id', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->update();
});

get('/turma/excluir/$id', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->excluir();
});

get('/turma/delete/$id', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->delete();
});
//FIM CRUD TURMA

//CRUD USUÁRIO
get('/usuario/cadastro', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->cadastro();
});

get('/usuario/lista', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->listar();
});

post('/usuario/save', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->save();
});

get('/usuario/atualizar/$id', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->atualizar();
});

post('/usuario/update/$id', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->update();
});

get('/usuario/excluir/$id', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->excluir();
});

get('/usuario/delete/$id', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->delete();
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


get('/livros/lista', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->listar();
});

post('/livros/save', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->save();
});

get('/livros/atualizar/$id', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->atualizar();
});

post('/livros/update/$id', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->update();
});

get('/livros/excluir/$id', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->excluir();
});

get('/livros/delete/$id', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->delete();
});    
//FIM CRUD LIVROS

//CRUD GRADE
get('/grade/cadastro', function(){
    $controller = new App\Controllers\GradeController();

    $controller->cadastro();
});

get('/grade/lista', function(){
    $controller = new App\Controllers\GradeController();

    $controller->listar();
});

post('/grade/save', function(){
    $controller = new App\Controllers\GradeController();

    $controller->save();
});

get('/grade/atualizar/$id', function(){
    $controller = new App\Controllers\GradeController();

    $controller->atualizar();
});

post('/grade/update/$id', function(){
    $controller = new App\Controllers\GradeController();

    $controller->update();
});

get('/grade/excluir/$id', function(){
    $controller = new App\Controllers\GradeController();

    $controller->excluir();
});

get('/grade/delete/$id', function(){
    $controller = new App\Controllers\GradeController();

    $controller->delete();
});
// FIM CRUD GRADE

//CRUD CURSOS
get('/curso/cadastro', function(){
    $controller = new App\Controllers\CursosController();

    $controller->cadastro();
});

get('/curso/lista', function(){
    $controller = new App\Controllers\CursosController();

    $controller->listar();
});

post('/curso/save', function(){
    $controller = new App\Controllers\CursosController();

    $controller->save();
});

get('/curso/atualizar/$id', function(){
    $controller = new App\Controllers\CursosController();

    $controller->atualizar();
});

post('/curso/update/$id', function(){
    $controller = new App\Controllers\CursosController();

    $controller->update();
});

get('/curso/excluir/$id', function(){
    $controller = new App\Controllers\CursosController();

    $controller->excluir();
});

get('/curso/delete/$id', function(){
    $controller = new App\Controllers\CursosController();

    $controller->delete();
});
// FIM CRUD CURSOS

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');

