@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
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
      <h1>Atualize Turma</h1>
      <a  class="btn btn-primary" href="/" >Home</a>

			<form method="post" action="{{route('turma.update',$turma->id)}}">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<input type="hidden" name="_method" value="PUT">
					<div class="form-group">



							<label for="nomeTurma">Nome Turma:</label>
							<input type="text"required="" class="form-control" name="nomeTurma" value="{{ $turma->nomeTurma }}"/>
					</div>
					<div class="form-group">
							<label for="periodo">Periodo :</label>
							<input type="text" required=""class="form-control" name="periodo" value="{{ $turma->periodo }}"/>
					</div>
					<div class="form-group">
							<label for="ch">CH:</label>
							<input type="text" required=""class="form-control" name="ch" value="{{ $turma->ch }}"/>
					</div>

          <div class="form-group">
              <label for="instrutor">instrutor:</label>
              <select name="fk_idInst" required="" class="form-control">
                <option value="{{ $turma->fk_idInst }}">Selecione Um Instrutor</option>


               <?php foreach ($inst as $user): ?>
               <option value="{{ $user->id }}">{{ $user->nomeInst}}</option>
              <?php endforeach; ?>

              </select>
          </div>



					<button type="submit" class="btn btn-primary">Atualizar</button>
			</form>
  </div>
</div>
@endsection
