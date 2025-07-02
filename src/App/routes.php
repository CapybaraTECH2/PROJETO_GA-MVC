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

get('/disciplina/atualizar/$id', function($id){
    $controller = new App\Controllers\DisciplinaController();

    $controller->atualizar($id);
});

post('/disciplina/update/$id', function($id){
    $controller = new App\Controllers\DisciplinaController();

    $controller->update($id);
});

get('/disciplina/excluir/$id', function($id){
    $controller = new App\Controllers\DisciplinaController();

    $controller->confirmarExclusao($id);
});

post('/discipĺina/delete/$id', function($id){
    $controller = new App\Controllers\DisciplinaController();

    $controller->delete($id);
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

get('/turma/atualizar/$id', function($id){
    $controller = new App\Controllers\TurmaController();

    $controller->atualizar($id);
});

post('/turma/update/$id', function($id){
    $controller = new App\Controllers\TurmaController();

    $controller->update($id);
});

get('/turma/excluir/$id', function($id){
    $controller = new App\Controllers\TurmaController();

    $controller->confirmarExclusao($id); 
});

post('/turma/delete/$id', function($id){
    $controller = new App\Controllers\TurmaController();

    $controller->delete($id);
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

get('/usuario/atualizar/$id', function($id){
    $controller = new App\Controllers\UsuarioController();

    $controller->atualizar($id);
});

post('/usuario/update/$id', function($id){
    $controller = new App\Controllers\UsuarioController();

    $controller->update($id);
});

get('/usuario/excluir/$id', function($id){
    $controller = new App\Controllers\UsuarioController();

    $controller->confirmarExclusao($id);
});

post('/usuario/delete/$id', function($id){
    $controller = new App\Controllers\UsuarioController();

    $controller->delete($id);
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

get('/professor/atualizar/$id', function($id){
    $controller = new App\Controllers\ProfessorController();

    $controller->atualizar($id);
});

post('/professor/update/$id', function($id){
    $controller = new App\Controllers\ProfessorController();

    $controller->update($id);
});

get('/professor/excluir/$id', function($id){
    $controller = new App\Controllers\ProfessorController();

    $controller->confirmarExclusao($id);
});

post('/professor/delete/$id', function($id){
    $controller = new App\Controllers\ProfessorController();

    $controller->delete($id);
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

get('/livros/atualizar/$id', function($id){
    $controller = new App\Controllers\LivrosController();

    $controller->atualizar($id);
});

post('/livros/update/$id', function($id){
    $controller = new App\Controllers\LivrosController();

    $controller->update($id);
});

get('/livros/excluir/$id', function($id){
    $controller = new App\Controllers\LivrosController();

    $controller->confirmarExclusao($id);
});

post('/livros/delete/$id', function($id){
    $controller = new App\Controllers\LivrosController();

    $controller->delete($id);
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

post('/grade/update/$id', function($id){
    $controller = new App\Controllers\GradeController();

    $controller->update($id);
});

get('/grade/excluir/$id', function($id){
    $controller = new App\Controllers\GradeController();

    $controller->confirmarExclusao($id);
});

post('/grade/delete/$id', function($id){
    $controller = new App\Controllers\GradeController();

    $controller->delete($id);
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

get('/curso/atualizar/$id', function($id){
    $controller = new App\Controllers\CursosController();

    $controller->atualizar($id);
});

post('/curso/update/$id', function($id){
    $controller = new App\Controllers\CursosController();

    $controller->update($id);
});

get('/curso/excluir/$id', function($id){
    $controller = new App\Controllers\CursosController();

    $controller->confirmarExclusao($id);
});

post('/curso/delete/$id', function($id){
    $controller = new App\Controllers\CursosController();

    $controller->delete($id);
});



// FIM CRUD CURSOS

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');

