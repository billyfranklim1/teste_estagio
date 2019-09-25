<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Aluno;
class AlunoController extends Controller
{
    //Metodo encaminha para formulario de cadastro de aluno
    public function index(){
    	return view('novoAluno');
    }

    //Metodo cadastra aluno
    public function store(Request $request){

      //verificação para não cadastrar dois alunos com o mesmo cpf e/ou e-mail
      $cpf = $request->get('cpf');
      $email = $request->get("email");
      $p_cpf = DB::select("select * from alunos where cpf='$cpf'");
      $p_email = DB::select("select * from alunos where email='$email'");

      $erro = 0;

      if($p_cpf != null){
        $erro = 1;
        return redirect('/aluno')->with('success', "ERRO! \n CPF já cadastrado!");
      }if($p_email != null){
        $erro = 1;
        return redirect('/aluno')->with('success', "ERRO! \n E-mail já cadastrado! ");
      }if($erro == 0){
         $aluno = new Aluno([
        'nomeAluno'=> $request->get('nomeAluno'),
        'cpf'=> $request->get('cpf'),
        'email'=>$request->get('email'),
        'telefone'=>$request->get('telefone'),
        'data_nascimento'=>$request->get('data_nascimento')
        ]);
        $aluno->save();
        return redirect('/aluno')->with('success', 'Aluno cadastrado com sucesso');

      }
    }
    //Metodo deleta aluno
    public function	destroy($id){

      $aluno =  Aluno::find($id);
      $aluno->delete();
      return redirect('/')->with('success', 'Aluno deletado com sucesso');

    }
    public function	update(){


    }

}
