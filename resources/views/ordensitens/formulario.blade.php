@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Incluir Item - Ordem de Serviço: {{$ordem}}</h1>
	
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="/ordensitens/adiciona/{{$ordem}}" method="post">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>Item</label><br>
			<select name="id_item">
				@foreach ($itens as $i)
					<option value="{{$i->id}}">{{$i->descricao}}</option>
				@endforeach
			</select> 
		</div>

		<div class="form-group">
			<label>Quantidade</label><br>
			<input name="quantidade" type="integer">
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