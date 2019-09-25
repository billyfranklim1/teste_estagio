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
  <div class="card-header">
    <h1>Cadastrar Instrutor</h1>
  </div>   
    <a  class="btn btn-primary" href="/" >Home</a>

      <form method="post" action="{{ route('instrutor.store') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

          <div class="form-group">
              <label for="nomeInst">Nome Instrutor:</label>
              <input type="text" required=""class="form-control" name="nomeInst"/>
          </div>
          <div class="form-group">
              <label for="emailInst">E-mail :</label>
              <input type="email"required="" class="form-control" name="emailInst"/>
          </div>
          <div class="form-group">
              <label for="valor_hora">Valor Hora:</label>
              <input type="number"required="" class="form-control" name="valor_hora" step="0.01"/>
          </div>
          <div class="form-group">
              <label for="certificados">Certificados:</label>
              <input type="text" required=""class="form-control" name="certificados"/>
          </div>

          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
