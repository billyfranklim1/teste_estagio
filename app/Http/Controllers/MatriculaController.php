<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Matricula;
use App\Turma;
use App\Aluno;

class MatriculaController extends Controller
{
     //Metodo encaminha para formulario para matricula

    public function index(){
      $turmas = DB::select('SELECT * FROM turmas');
      $alunos = DB::select('SELECT * FROM alunos');
      return view('matricula', compact('turmas','alunos'));
    }
    //metodo de matricula
    public function store(Request $request){
      $id = $request->get('fk_idTurma');
      $idAl = $request->get('fk_idAluno');
      $sql = DB::select("select * from matriculas m,alunos a, turmas t WHERE m.fk_idTurma= '$id' and  m.fk_idTurma  = t.id and m.fk_idAluno='$idAl'");
      if($sql != null){
        return redirect('/matricula')->with('success', "Aluno não matriculado, pois o aluno está matriculado nessa turma");
      }

      elseif($sql == null){
        $matricula = new Matricula([
          'fk_idTurma'=> $request->get('fk_idTurma'),
          'fk_idAluno'=> $request->get('fk_idAluno'),
        ]);
        $matricula->save();
        return redirect('/matricula')->with('success', 'Aluno Matriculado com sucesso');
      }

    }
 //metodo apaga matricula
    public function destroy( Request $request){
      echo "<h1>Não implementado</<h1>";
    }
//metodo retorna todos os alunos matriculados em determinada turma
    public function show($id){
      $alunos = DB::select("select t.id,nomeAluno,cpf,email,telefone,data_nascimento from matriculas m,alunos a, turmas t WHERE m.fk_idTurma= '$id' and  m.fk_idTurma  = t.id and m.fk_idAluno=a.id");
      return view('alunosMatriculados', compact('alunos'));

    }
//metodo retorna todos os instrutores alocados em seus repectivas turmas
    public function edit($id){
      $instrutores = DB::select("select * from turmas t, instrutores i where fk_idInst = i.id and t.id='$id'");
      return view('instrutoresAlocado', compact('instrutores'));

    }
}
