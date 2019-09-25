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
          <td>Nome</td>
          <td>Periodo</td>
          <td>Instrutor</td>
          <td>Carga Horaria</td>
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($turmas as $turma)
        <tr>
            <td>{{$turma->nomeTurma}}</td>
            <td>{{$turma->periodo}}</td>
            <td>{{$turma->nomeInst}}</td>
            <td>{{$turma->ch}}</td>

            <td><a href="{{ route('turma.edit',$turma->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('turma.destroy',$turma->id)}}" method="post">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
