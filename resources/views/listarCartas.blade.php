
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
  <table>
    <tr>
      <td><a  class="btn btn-primary" href="/" >Home</a></td>
      <td>  <form action="/criarCarta" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="id" value="{{$id}}">
          <button class="btn btn-success" type="submit">Add Carta</button>
        </form></td>
    </tr>

    </table>

  <!-- <a href="" class="btn btn-primary">Add Carta</a> -->



  <table class="table table-striped">
    <thead>
        <tr>
          <td>Frente</td>
          <td>Costa</td>
          <td colspan="3">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cartas as $carta)
        <tr>
            <td>{{$carta->frenteCarta}}</td>
            <td>{{$carta->costaCarta}}</td>
            <td><a href="{{ route('carta.edit',$carta->idCarta)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('carta.destroy',$carta->idCarta)}}" method="post">
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
