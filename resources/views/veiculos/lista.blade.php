@extends('layouts.app')
@section('content')
@if(empty($veiculos))
	<div>Não existem veículos cadastrados</div>
@else

	<div class="container">
		<h1>Veículos cadastrados</h1>
		<table class="table table-striped table-bordered table-hover">
			<tr style="background-color:#808080">
				<td><b>Placa</b></td>
				<td><b>Marca</b></td>
				<td><b>Modelo</b></td>
				<td><b>Cor</b></td>
				<td><b>KM</b></td>
				<td><b>Proprietário</b></td>
			</tr>
			@foreach ($veiculos as $v) 
				<tr>
					<td>{{$v->placa}} </td>
					<td>{{$v->marca}}</td>
					<td>{{$v->modelo}}</td>
					<td>{{$v->cor}}</td>
					<td>{{$v->km}}</td>
					<td>{{$v->nome}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@endif
@stop