<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma;
use App\Instrutor;


class TurmaController extends Controller
{
  //Metodo encaminha para formulario de cadastro de turma

  public function index(){
    return view('novaTurma');
  }
  //lista todas as turmas
  public function allTurmas(){
    $turmas = DB::select("select tur.id, inst.nomeInst,tur.nomeTurma,tur.fk_idInst, tur.periodo,tur.ch from turmas as tur,instrutores as inst where fk_idInst=inst.id ");
    return view('ListarTurmas', compact('turmas'));
  }

//atualiza dados das turmas
  public function update(Request $request, $id){

    $turma = Turma::find($id);
    $turma->nomeTurma = $request->get('nomeTurma');
    $turma->periodo = $request->get('periodo');
    $turma->ch = $request->get('ch');
    $turma->fk_idInst =$request->get('fk_idInst');
    $turma->save();
    return redirect('/listarTurmas')->with('success', 'Turma Atualizada com Sucesso');


  }

//buscas dados de determinada turma
  public function edit($idTurma){
     $turma = Turma::find($idTurma);
     $inst = DB::select('SELECT * FROM instrutores');
    return view('editTurma', compact('turma','inst'));
  }

//cadastra turma
  public function store(Request $request){
    $turma = new Turma([
      'nomeTurma'=> $request->get('nomeTurma'),
      'periodo'=> $request->get('periodo'),
      'ch'=> $request->get('ch'),
      'fk_idInst'=>$request->get('fk_idInst')
    ]);
    $turma->save();
    return redirect('/')->with('success', 'Turma cadastrada com sucesso');

  }

  //deleta turma
  public function destroy($id){
     $turma = Turma::find($id);
     $turma->delete();
     return redirect('/listarTurmas')->with('success', 'Turma deletada com sucesso!');
   }
}
