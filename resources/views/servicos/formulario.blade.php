@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Novo Serviço</h1>
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
	<form action="/servicos/adiciona" method="post">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>Código</label><br>
			<input name="codigo" size="20"> 
		</div>
		
		<div class="form-group">
			<label>Descrição</label><br>
			<input name="descricao" size="150">
		</div>

		<div class="form-group">
			<label>Valor</label><br>
			<input name="valor" type="number" step="0.02">  
		</div>

		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop