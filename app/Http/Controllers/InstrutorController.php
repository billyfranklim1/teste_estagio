<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Instrutor;
class InstrutorController extends Controller
{

  //Metodo encaminha para formulario de cadastro de instrutor

    public function index(){
    	return view('novoInstrutor');
    }
    //metodo para cadastro do instrutor
    public function store(Request $request){
      //verificação para não cadastrar dois instrutores com o mesmo e-mail
      $email = $request->get('emailInst');
      $p_email =  DB::select("select * from instrutores where emailInst='$email'");
      $erro1 = 0;
      if($p_email != null){
        $erro1 = 1;
        return redirect('/instrutor')->with('success', 'ERRO! email já cadastrado');
    }if($erro1 == 0){
        $instrutor = new Instrutor([
          'nomeInst'=> $request->get('nomeInst'),
          'emailInst'=> $request->get('emailInst'),
          'valor_hora'=>$request->get('valor_hora'),
          'certificados'=>$request->get('certificados')
        ]);
        $instrutor->save();
        return redirect('/Instrutor')->with('success', 'Instrutor cadastrado com sucesso');
      }

    }
    //metodo deleta determinado instrutor
    public function	destroy($id){
      $inst =  Instrutor::find($id);
      $sql = DB::select("select * from turmas where fk_idInst='$id'");
      if($sql != null){
          return redirect('/')->with('success', "Instrutor não deletado, pois o instrutor está alocado em turma");
      }else{
      $inst->delete();
      return redirect('/')->with('success', 'Instrutor deletado com sucesso');
        }

    }
}
