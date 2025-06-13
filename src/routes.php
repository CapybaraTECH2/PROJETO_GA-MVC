<?php

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/', function(){
    echo 'Index';
});

get('/disciplina/cadastro', function(){
    $controller = new App\Controllers\DisciplinaController();

    $controller->cadastro();
});

get('/turma/cadastro', function(){
    $controller = new App\Controllers\TurmaController();

    $controller->cadastro();
});

get('/usuario/cadastro', function(){
    $controller = new App\Controllers\UsuarioController();

    $controller->cadastro();
});

get('/professor/cadastro', function(){
    $controller = new App\Controllers\ProfessorController();

    $controller->cadastro();
});

get('/livros/cadastro', function(){
    $controller = new App\Controllers\LivrosController();

    $controller->cadastro();
});

get('/grade/cadastro', function(){
    $controller = new App\Controllers\GradeController();

    $controller->cadastro();
});

get('/curso/cadastro', function(){
    $controller = new App\Controllers\CursosController();

    $controller->cadastro();
});


// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');