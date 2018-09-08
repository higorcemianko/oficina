@extends('layouts.app')
@section('content')
@if(empty($clientes))
	<div>Não existem clientes cadastrados</div>
@else

	<div class="container">
		<h1>Clientes cadastrados</h1>
		<table class="table table-striped table-bordered table-hover">
			<tr style="background-color:#808080">
				<td><b>CNPJ/CPF</b></td>
				<td><b>Nome</b></td>
				<td><b>Tipo de Pessoa</b></td>
				<td><b>Telefone</b></td>
				<td><b>Endereço</b></td>
				<td><b>E-mail</b></td>
			</tr>
			@foreach ($clientes as $c) 
				<tr>
					<td>{{$c->cpfcnpj}} </td>
					<td>{{$c->nome}}</td>
					@if ($c->tipopessoa == 1)
						<td>Física</td>
					@else
						<td>Jurídica</td>
					@endif
					<td>{{$c->ddd}} - {{$c->telefone}}</td>
					<td>{{$c->endereco}}</td>
					<td>{{$c->email}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@endif
@stop