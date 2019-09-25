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
          <th>Nome</th>
          <th>cpf</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Data de Nascimento</th>
          <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>

        @foreach($alunos as $aluno)
        <tr>
            <td>{{$aluno->nomeAluno}}</td>
            <td>{{$aluno->cpf}}</td>
            <td>{{$aluno->email}}</td>
            <td>{{$aluno->telefone}}</td>
            <td>{{$aluno->data_nascimento}}</td>
            <td>
                <form action="{{ route('matricula.destroy') }" method="post">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <imput type='hidden' name="nomeAluno" value='{{$aluno->nomeAluno}}'>
                  <imput type='hidden' name="id" value='{{$aluno->id}}'>

                  <button class="btn btn-danger" type="submit">Desmatricular</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
