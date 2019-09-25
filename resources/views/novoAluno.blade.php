@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card-header">
    <h1>Cadastrar Aluno</h1>
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

      <form method="post" action="{{ route('aluno.store') }}">
        <input type="hidden"required="" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="form-group">
              <label for="nomeAluno">Nome Aluno:</label>
              <input type="text"required="" class="form-control" name="nomeAluno"/>
          </div>
          <div class="form-group">
              <label for="cpf">CPF :</label>
              <input type="text"  required=""class="form-control" name="cpf" id="cpf"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" required=""class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="telefone">Telefone:</label>
              <input type="text"required="" class="form-control" name="telefone" id="telefone"/>
          </div>
          <div class="form-group">
              <label for="data_nascimento">Data de Nascimento:</label>
              <input type="date"required="" class="form-control" name="data_nascimento"/>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
