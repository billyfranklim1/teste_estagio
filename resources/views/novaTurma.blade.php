@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Criar Turma
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <a  class="btn btn-primary" href="/" >Home</a>

      <form method="post" action="{{ route('turma.store') }}">
          <div class="form-group">
            <input type="hidden" required="" name="_token" value="<?php echo csrf_token(); ?>">

              <label for="nomeTurma">Nome Turma:</label>
              <input type="text" required="" class="form-control" name="nomeTurma"/>
          </div>
          <div class="form-group">
              <label for="periodo">Periodo :</label>
              <input type="text"  required="" maxlength="6"class="form-control" name="periodo"/>
          </div>
          <div class="form-group">
              <label for="ch">CH:</label>
              <input type="text" required="" class="form-control" name="ch"/>
          </div>
          <div class="form-group">
              <label for="instrutor">Instrutor:</label>
              <select name="fk_idInst" required=""class="form-control">
                <option>Selecione  um instrutor</option>

              @foreach($inst as $user)
               <option value="{{ $user->id }}">{{ $user->nomeInst}}</option>
              @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
