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
</div>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de repetição espaçada</title>
</head>
<body>
    <table >
      <tr>
          <caption><h2>Ações</h2></caption>

          <td><a href="/criarBaralho" class="btn btn-primary">Criar Baralho</a></td>
          <!-- <td</td> -->
          <td><a href="/listarBaralhos" class="btn btn-primary">Listar Baralhos</a></td>
          <!-- <td><a href="/criarCarta" class="btn btn-primary">Criar Cartas</a></td>
          <td><a href="/listarCartas" class="btn btn-primary">Listar Cartas</a></td> -->
          <!-- <td><a href="{{route('matricula.index')}}" class="btn btn-primary">Nova Matricula</a></td> -->
      </tr>
    </table>
</body>
</html>
