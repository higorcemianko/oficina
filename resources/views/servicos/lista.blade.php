@extends('layouts.app')
@section('content')
@if(empty($servicos))
	<div>Não existem serviços cadastrados</div>
@else

	<div class="container">
		<h1>Serviços cadastrados</h1>
		<table class="table table-striped table-bordered table-hover">
			<tr style="background-color:#808080">
				<td><b>Código</b></td>
				<td><b>Descrição</b></td>
				<td><b>Valor</b></td>
			</tr>
			@foreach ($servicos as $s) 
				<tr>
					<td>{{$s->codigo}} </td>
					<td>{{$s->descricao}}</td>
					<td>{{$s->valor}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@endif
@stop