<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Carta;
use App\Baralho;

class CartaController extends Controller
{
  public function destroy($id){
      $carta = Carta::find($id);
      // dd($carta);
      $fk=$carta->fk_idBaralho;
      $carta->delete();
      return redirect("/carta/$fk")->with('success', 'Carta atualizada com sucesso');
   }

public function update(Request $request, $id){
  // dd("ok");
    $carta = Carta::where('idCarta',$id)->first();
    $carta->frenteCarta = $request->get('frenteCarta');
    $carta->costaCarta = $request->get('costaCarta');
    if($carta ->save()){
        return redirect("/carta/$request->fk_idBaralho")->with('success', 'Carta atualizada com sucesso');
    }else {
         return redirect("/carta/$request->fk_idBaralho")->with('success', 'Carta não atualizada');
    }
}
  public function edit($id){
      $carta = Carta::where('idCarta',$id)->get();
      // dd($baralho);
      return view('editCarta',compact('carta'));

  }
    //Metodo encaminha para formulario de cadastro de aluno
    public function show($id){
        $cartas = Carta::where('fk_idBaralho',$id)->get();
        // dd($baralhos);
         return view('listarCartas',compact('cartas','id'));
        // echo "Listar Carta";
    }
    public function cadastro(Request $request){

        $carta = new Carta([
          'frenteCarta'=> $request->get('frenteCarta'),
          'costaCarta'=> $request->get('costaCarta'),
          'nivel'=> 3,
          'fk_idBaralho'=> $request->get('fk_idBaralho'),
        ]);
        if($carta->save()){
            // return 'Salvo';
             return redirect("/carta/$request->fk_idBaralho")->with('success', 'Carta adicionada com sucesso');
        }else{
             return redirect("/carta/$request->fk_idBaralho")->with('success', 'Carta não adicionada');
        }



    }


}
