@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card-header">
    <h1>Cadastrar Baralho</h1>
  </div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <script type="text/javascript">
  	$(document).ready(function(){
  		$("#cpf").mask("999.999.999-99");
      $("#telefone").mask("(99) 9 9999-9999");
  	});
  </script>
<?php

 // dd($baralho);
  ?>
    <a  class="btn btn-primary" href="/" >Home</a>
@foreach($baralho as $baralh)
      <form method="post" action="{{ route('baralho.update', $baralh->idBaralho) }}">
        <input type="hidden"required="" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">

          <div class="form-group">

              <label for="nomeBaralho">Nome Baralho: </label>
              <input type="text"required="" value="{{ $baralh->nomeBaralho}}"class="form-control" name="nomeBaralho"/>
          </div>
          <div class="form-group">
              <label for="descricaoBaralho">Descrição Baralho :</label>
              <input type="text"  required=""class="form-control" value="{{ $baralh->descricaoBaralho}}" name="descricaoBaralho" id="descricaoBaralho"/>
          </div>
              @endforeach
          <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
