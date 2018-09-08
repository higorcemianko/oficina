@extends('layouts.app')
@section('content')
@if(empty($itens))
	<div>Não existem itens cadastrados</div>
@else

	<div class="container">
		<h1>Itens cadastrados</h1>
		<table class="table table-striped table-bordered table-hover">
			<tr style="background-color:#808080">
				<td><b>Código</b></td>
				<td><b>Descrição</b></td>
				<td><b>Valor</b></td>
			</tr>
			@foreach ($itens as $i) 
				<tr>
					<td>{{$i->codigo}} </td>
					<td>{{$i->descricao}}</td>
					<td>{{$i->valor}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@endif
@stop