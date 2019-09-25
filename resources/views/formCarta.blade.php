@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card-header">
    <h1>Cadastrar Carta</h1>
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

  <?php $id = $_POST["id"]; ?>

    <a  class="btn btn-primary" href="/" >Home</a>

      <form method="post" action="/cadCarta">
        <input type="hidden"required="" name="_token" value="<?php echo csrf_token(); ?>">

        <!-- <div class="form-group">
            <label for="baralho">Baralho:</label>
            <select name="fk_idBaralho"required="" class="form-control">
              <option>Selecione um baralho</option>
              @foreach($baralhos as $baralho)
              <option value="{{ $baralho->idBaralho }}">{{ $baralho->nomeBaralho}}</option>
              @endforeach
            </select>
        </div> -->
        <div class="form-group">
            <!-- <label for="frenteCarta">Baralho</label> -->
            <input type="hidden" value="{{$id}}" required=""class="form-control" name="fk_idBaralho" id="fk_idBaralho"/>
        </div>
          <div class="form-group">
              <label for="frenteCarta">Frente Carta</label>
              <input type="text"  required=""class="form-control" name="frenteCarta" id="frenteCarta"/>
          </div>
          <div class="form-group">
              <label for="costaCarta">Costa Carta</label>
              <input type="text"  required=""class="form-control" name="costaCarta" id="costaCarta"/>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
      </form>
  </div>
</div>
@endsection
