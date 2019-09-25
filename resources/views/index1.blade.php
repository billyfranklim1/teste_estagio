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
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de controle de Matriculas</title>
</head>
<body>
  <div>
  </div>
  <div class="container"  >
    <h1>Sistema de Controle de Matricula</h1>

	<div>
    <h3>Insformações da instituição</h3>
		<table class="table table-striped">
			<tr>
				<th>Nome da instituição: </th>
				<td>SeijNet</td>
			</tr>
			<tr>
				<th>Endereço: </th>
				<td>São francisco</td>
			</tr>
			<tr>
				<th>Razão Social: </th>
				<td>123.123.123-12</td>
			</tr>
			<tr>
				<th>Telefone: </th>
				<td>98 98998988</td>
			</tr>

		</table>
	</div>
  <br>
<table class="table table-striped">
  <tr>
      <caption><h2>Ações</h2></caption>

      <td><a href="/listarTurmas" class="btn btn-primary">Listar Turmas</a></td>
      <td><a href="/novaTurma" class="btn btn-primary">Nova Turma</a></td>
      <td><a href="{{route('matricula.index')}}" class="btn btn-primary">Nova Matricula</a></td>
  </tr>
</table>


<br>

	<table  class="table table-striped">
    <caption><h2>Informações de turmas</h2></caption>
		<tr>
			<th>Nome da Turma</th>
			<th>Periodo</th>
			<th>CH</th>
		    <th colspan="3">Ações</th>
		</tr>
		@foreach($turmas as $turma)
		<tr>
			<td>{{$turma ->nomeTurma}}</td>
			<td>{{$turma->periodo}}</td>
			<td>{{$turma->ch}}</td>
			<td><a href="{{ route('matricula.show', ['id'=>$turma->id]) }}" class="btn btn-primary">Aluno</a></td>
      		<td><a href="{{ route('matricula.edit', ['id'=>$turma->id]) }}" class="btn btn-primary">Instrutores</a></td>
      		@endforeach

		</tr>
	</table>
	<table class="table table-striped">
    <caption><h2>Alunos das Turmas</h2></caption>
		<th><a href="novoAluno" class="btn btn-primary">Novo Aluno</a></th>
	</table>
  <br>
	<table class="table table-striped">
		<tr>
			<th> Nome do aluno </th>
			<th> CPF </th>
			<th> Email </th>
			<th> Telefone </th>
		  <th> Data de Nascimento </th>
		</tr>

@foreach($alunos as $aluno)
		<tr>
			<td> {{$aluno->nomeAluno}} </td>
			<td> {{$aluno->cpf}} </td>
			<td> {{$aluno->email}} </td>
			<td> {{$aluno->telefone}} </td>
			<td> {{$aluno->data_nascimento}} </td>
			<td>
					<form action="{{ route('aluno.destroy',$aluno->id)}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="_method" value="DELETE">
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
			</td>
</td>
@endforeach

	</table>
<br>
  <br>
  <br>
	<table class="table table-striped">
	<tr>
			<caption><h2>Instrutores das Turmas</h2></caption>
			<td><a href="novoInstrutor" class="btn btn-primary">Instrutor</a></td>
  </tr>
	</table>
	<table class="table table-striped">
		<tr>
			<th> Instrutor </th>
			<th> Email </th>
			<th> Valor Hora </th>
			<th> Certificados </th>
		</tr>
	@foreach($inst as $ins)
	<tr>
		<td> {{$ins->nomeInst}} </td>
		<td> {{$ins->emailInst}} </td>
		<td> {{$ins->valor_hora}} </td>
		<td> {{$ins->certificados}} </td>
		<td>
				<form action="{{ route('instrutor.destroy',$ins->id)}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="DELETE">
					<button class="btn btn-danger" type="submit">Delete</button>
				</form>
		</td>
	</tr>
@endforeach
	</table>
  </div>
</body>
</html>
