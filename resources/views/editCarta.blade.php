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

  <?php $id =1 ?>

    <a  class="btn btn-primary" href="/" >Home</a>
    @foreach($carta as $cart)

      <form method="post" action="{{ route('carta.update', $cart->idCarta) }}">
        <input type="hidden"required="" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">


        <div class="form-group">
            <input type="hidden" value="{{$cart->fk_idBaralho}}" required=""class="form-control" name="fk_idBaralho" id="fk_idBaralho"/>
        </div>
          <div class="form-group">
              <label for="frenteCarta">Frente Carta</label>
              <input type="text"   value="{{$cart->frenteCarta}}" required=""class="form-control" name="frenteCarta" id="frenteCarta"/>
          </div>
          <div class="form-group">
              <label for="costaCarta">Costa Carta</label>
              <input type="text"  value="{{$cart->costaCarta}}" required=""class="form-control" name="costaCarta" id="costaCarta"/>
          </div>
          @endforeach
          <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
