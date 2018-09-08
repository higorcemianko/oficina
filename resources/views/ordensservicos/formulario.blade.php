@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Incluir Serviço - Ordem de Serviço: {{$ordem}}</h1>
	
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="/ordensservicos/adiciona/{{$ordem}}" method="post">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>Serviço</label><br>
			<select name="id_servico">
				@foreach ($servicos as $s)
					<option value="{{$s->id}}">{{$s->descricao}}</option>
				@endforeach
			</select> 
		</div>

		<div class="form-group">
			<label>Tempo</label><br>
			<input name="tempo" type="number" step="0.02">
		</div>

		<div class="form-group">
			<label>Desconto</label><br>
			<input name="desconto" type="number" step="0.02">
		</div>		

		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop