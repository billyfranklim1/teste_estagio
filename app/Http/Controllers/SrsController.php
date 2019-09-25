<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Aluno;


use App\Carta;
use App\Baralho;

class SrsController extends Controller
{
    //Metodo encaminha para formulario de cadastro de aluno
    public function index(Request $request){
      // dd($request->id);
      $cartas3 = Carta::where('fk_idBaralho',$request->id)
      ->where('nivel',3)
      ->orderBy('nivel', 'Desc')
      // ->orderBy(rand())
      ->get();//all();
      $cartas2 = Carta::where('fk_idBaralho',$request->id)
      ->where('nivel',2)
      ->orderBy('nivel', 'Desc')
      // ->orderBy(rand())
      ->get();//all()
      $cartas1 = Carta::where('fk_idBaralho',$request->id)
      ->where('nivel',1)
      ->orderBy('nivel', 'Desc')
      // ->orderBy(rand())
      ->get();//all()


      dd($cartas3);
    }


}
