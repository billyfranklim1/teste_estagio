<?php

use App\Turma;
use App\Aluno;
use App\Instrutor;
use App\Matricula;
use App\Baralho;



// Route::get('/',function	(){
//     // echo "string";
//
//     $turmas =  DB::select('SELECT * FROM turmas');
//     $alunos =  DB::select('SELECT * FROM alunos');
//     $inst =  DB::select('SELECT * FROM instrutores');
//     return view('index', compact('turmas','alunos','inst'));
//
// });

// Route::get('/','SrsController@index');

Route::get('/',function(){return view('index');});



Route::get('/criarBaralho',function(){return view('formBaralho');});
Route::post('/criarCarta',function(){
    $baralhos = Baralho::all();
    return view('formCarta',compact('baralhos'));});
Route::post('/cadBaralho','BaralhoController@cadastro');
Route::post('/cadCarta','CartaController@cadastro');
Route::get('/listarBaralhos','BaralhoController@listar');
// Route::get('/listarCartas','CartaController@listar');
Route::get('/editBaralho','BaralhoController@editBaralho');

Route::resource('baralho', 'BaralhoController');
Route::resource('carta', 'CartaController');

Route::get('atulizarBaralho','BaralhoController@updateBaralho');

Route::post('/srs','SrsController@index');

Route::get('/novoInstrutor','InstrutorController@index');
Route::get('/novaTurma','TurmaController@index');
Route::get('/novoAluno','AlunoController@index');
Route::get('/listarTurmas','TurmaController@allTurmas');
Route::get('/editTurma','TurmaController@edit');
Route::get('/alunosMatriculados','MatriculaController@lista');


Route::get('editTurma',function(){
  $turma = DB::select("SELECT * FROM turmas where idTurma='$idTurma'");
  return view('editTurma', compact('turma'));
});

Route::get('/novaTurma', function () {
  $inst = DB::select('SELECT * FROM instrutores');
  return view ('novaTurma', ['inst'=>$inst]);
});

Route::resource('turma', 'TurmaController');
Route::resource('aluno', 'AlunoController');
Route::resource('instrutor', 'InstrutorController');
Route::resource('matricula', 'MatriculaController');
