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
          <th>E-mail</th>
          <th>Valor Hora</th>
          <th>Certificados</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instrutores as $inst)
        <tr>
            <td>{{$inst->nomeInst}}</td>
            <td>{{$inst->emailInst}}</td>
            <td>{{$inst->valor_hora}}</td>
            <td>{{$inst->certificados}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
