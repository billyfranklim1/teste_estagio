@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
	<a  class="btn btn-primary" href="/" >Home</a>

  <table class="table table-striped">
    <thead>
        <tr>
          <td>#</td>
          <td>Nome</td>
          <td colspan="3">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($baralhos as $baralho)
        <tr>
            <td>{{$baralho->idBaralho}}</td>
            <td>{{$baralho->nomeBaralho}}</td>
            <td><a href="{{ route('carta.show',$baralho->idBaralho)}}" class="btn btn-primary">Listar Cartas</a></td>
            <td>  <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary">Aprender</button>

              <?php $_SESSION["id"] = $baralho->idBaralho;?></td>
            <td>  <form action="/criarCarta" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$baralho->idBaralho}}">
                <button class="btn btn-success" type="submit">Add Carta</button>
              </form></td>
            <td><a href="{{ route('baralho.edit',$baralho->idBaralho)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('baralho.destroy',$baralho->idBaralho)}}" method="post">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
              <form action="/srs " method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$baralho->idBaralho}}">
                <button class="btn btn-primary" type="submit">Sistema de Repetição</button>
              </form>
            </td>
            <td>
                 <a href="{{ route('carta.show',$baralho->idBaralho)}}" class="btn btn-primary">Jogos</a>
            </td>
            <td>
              <div id="id01" class="w3-modal">
               <div class="w3-modal-content">
                 <div class="w3-container">
                   <!-- <table class="table table-striped">
                     <thead>
                         <tr>
                           <td colspan="3">Ações</td>
                         </tr>
                     </thead>
                     <tbody> -->
                         <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                         <!-- <th> -->

                         <!-- </th> -->
                         <!-- <th> -->

                         <!-- </th> -->
                     <!-- </tbody> -->
                 </div>
               </div>
             </div>


            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>




@endsection
