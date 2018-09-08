@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Novo Veículo</h1>
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
	<form action="/veiculos/adiciona" method="post" >
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>Placa</label><br>
			<input name="placa" size="8"> 
		</div>

		<div class="form-group">
			<label>Marca</label><br>
			<select name="marca">
				<option value="Fiat">Fiat</option>
				<option value="Volkswagem">Volkswagem</option>
				<option value="Ford">Ford</option>
				<option value="Honda">Honda</option>
				<option value="Hyundai">Hyundai</option>
				<option value="Chevrolet">Chevrolet</option>
			</select>
		</div>

		<div class="form-group">
			<label>Modelo</label><br>
			<input name="modelo" size="150">
		</div>

		<div class="form-group">
			<label>Cor</label><br>
			<input name="cor" size="150">
		</div>		

		<div class="form-group">
			<label>KM</label><br>
			<input name="km" type="number"> 
		</div>

		<div class="form-group">
			<label>Proprietário</label><br>
			<select name="proprietario">
				@foreach ($clientes as $c)
					<option value="{{$c->id}}">{{$c->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<span style="color:red" id="error"> </span>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop