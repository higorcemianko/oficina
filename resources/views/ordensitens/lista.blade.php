@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Itens - Ordem de Serviço {{$ordem->id}}</h1>
	
	<table class="table table-striped table-bordered table-hover">
		<tr style="background-color:#808080">
			<td><b>Código</b></td>
			<td><b>Descrição</b></td>
			<td><b>Total</b></td>
			<td><b>Desconto</b></td>
			<td><b>Total Líquido</b></td>
			<td><b>Excluir</b></td>
		</tr>
		@foreach ($ordensitens as $oi)
			<tr>
			    <td>{{$oi->codigo}} </td>
				<td>{{$oi->descricao}}</td>
				<td>{{$oi->total}}</td>
				<td>{{$oi->desconto}}</td>
				<td>{{$oi->total_liquido}}</td>
				<td><a href="{{action('OrdemItemController@confirmaExclusao', $oi->id)}}" ><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		@endforeach
	</table>
	
	<div class="form-group">
		<td><a href="/ordensitens/novo/{{$ordem->id}}" class="btn btn-primary">Novo <span class="glyphicon glyphicon-plus"></span></a></td>
		<td><a href="/ordens/detalhes/{{$ordem->id}}" class="btn btn-primary">Volar à Ordem </a></td>
	</div>
</div>
@stop