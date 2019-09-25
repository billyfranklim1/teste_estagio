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

    <a  class="btn btn-primary" href="/" >Home</a>

      <form method="post" action="/cadBaralho">
        <input type="hidden"required="" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="form-group">
              <label for="nomeBaralho">Nome Baralho: </label>
              <input type="text"required="" class="form-control" name="nomeBaralho"/>
          </div>
          <div class="form-group">
              <label for="descricaoBaralho">Descrição Baralho :</label>
              <input type="text"  required=""class="form-control" name="descricaoBaralho" id="descricaoBaralho"/>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
