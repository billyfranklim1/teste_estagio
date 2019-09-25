<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Baralho;
class BaralhoController extends Controller
{
  public function destroy($id){
     $baralho = Baralho::find($id);
     $baralho->delete();
      return redirect('/listarBaralhos')->with('success', 'Baralho Deletado com sucesso');
   }
    public function update(Request $request, $id){
        $baralho = Baralho::where('idBaralho',$id)->first();
        $baralho->nomeBaralho = $request->get('nomeBaralho');
        $baralho->descricaoBaralho = $request->get('descricaoBaralho');
        if($baralho->save()){
            return redirect('/listarBaralhos')->with('success', 'Baralho atualizado com sucesso');
        }else {
             return redirect('/listarBaralhos')->with('success', 'Baralho não atualizado');
        }
    }

    public function edit($id){
        $baralho = Baralho::where('idBaralho',$id)->get();
        // dd($baralho);
        return view('editBaralho',compact('baralho'));

    }
    //Metodo encaminha para formulario de cadastro de aluno
    public function listar(){
        $baralhos = Baralho::all();
        return view('/listarBaralhos',compact('baralhos'));
        // echo "Listar Baralho";
    }
    public function cadastro(Request $request){

        $baralho = new Baralho([
          'nomeBaralho'=> $request->get('nomeBaralho'),
          'descricaoBaralho'=> $request->get('descricaoBaralho'),
        ]);
        if($baralho->save()){
           return redirect('/')->with('success', 'Baralho cadastrado com sucesso');
        }else{
            return redirect('/')->with('success', 'Baralho não cadastrado');
        }



    }


}
