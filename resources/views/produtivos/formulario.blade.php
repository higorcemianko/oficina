@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Novo Produtivo</h1>
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
	<form action="/produtivos/adiciona" method="post">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>CPF</label><br>
			<input name="cpf" type="integer"> 
		</div>

		<div class="form-group">
			<label>Nome</label><br>
			<input name="nome" size="150">
		</div>

		<div class="form-group">
			<label>Função</label><br>
			<select name="funcao">
				<option value="Mecânico">Mecânico</option>
				<option value="Funileiro">Funileiro</option>
				<option value="Tapeceiro">Tapeceiro</option>
				<option value="Pintor">Pintor</option>
			</select>
		</div>		
		
		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop