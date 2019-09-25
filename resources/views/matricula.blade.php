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
  <h1>Matricular</h1>
    <a  class="btn btn-primary" href="/" >Home</a>
      <form method="post" action="{{ route('matricula.store') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <div class="form-group">
            <label for="turma">Turma:</label>
            <select name="fk_idTurma" required=""class="form-control">
              <option>Selecione  uma turma</option>
             @foreach($turmas as $turma)
              <option value="{{ $turma->id }}">{{ $turma->nomeTurma}}</option>
             @endforeach
            </select>
        </div>
          <div class="form-group">
              <label for="aluno">Aluno:</label>
              <select name="fk_idAluno"required="" class="form-control">
                <option>Selecione  um aluno</option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nomeAluno}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
