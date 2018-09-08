@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Nova Ordem de Serviço</h1>
	</div>
	
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="/ordens/adiciona" method="post">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>Placa</label><br>
			<select name="id_veiculo">
				@foreach ($veiculos as $v)
					<option value="{{$v->id}}">{{$v->placa}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label>Descrição</label><br>
			<input name="descricao" size="150">
		</div>

		<div class="form-group">
			<label>KM</label><br>
			<input name="km" type="number">
		</div>

		

		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop