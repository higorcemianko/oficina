@extends('layouts.app')
@section('content')
@if(empty($ordens))
	<div>Não existem ordens de serviço</div>
@else

	<div class="container">
		<h1>Ordens de Serviço</h1>
		<table class="table table-striped table-bordered table-hover">
			<tr style="background-color:#808080">
				<td><b>Número</b></td>
				<td><b>Descrição</b></td>
				<td><b>Placa</b></td>
				<td><b>Cliente</b></td>
				<td><b>Total</b></td>
				<td><b>Detalhes</b></td>
			</tr>
			@foreach ($ordens as $o) 
				<tr>
					<td>{{$o->id}} </td>
					<td>{{$o->descricao}}</td>
					<td>{{$o->placa}}</td>
					<td>{{$o->nome}}</td>
					<td>{{$o->total}}</td>
					<td align="center"><a href="{{action('OrdemController@detalhes',$o->id)}}" ><span class="glyphicon glyphicon-search"></span></a></td>
				</tr>
			@endforeach
		</table>
	</div>
@endif
@stop