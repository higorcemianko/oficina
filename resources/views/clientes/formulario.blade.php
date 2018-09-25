@extends('layouts.app')
@section('content')
<div  class="container">
	<div>
		<h1>Novo Cliente</h1>
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
	<form action="/clientes/adiciona" method="post" name="frmCliente" onsubmit="return validarCliente(document.frmCliente.cpfcnpj.value, document.frmCliente.tipopessoa.value)">
		<input type="hidden"
			name="_token" value="{{{ csrf_token() }}}" />
		<div class="form-group">
			<label>CPF/CNPJ</label><br>
			<input name="cpfcnpj"> 
		</div>

		<div class="form-group">
			<input type="radio" name="tipopessoa" value="1"> <label>Pessoa Física</label>
			<input type="radio" name="tipopessoa" value="2"> <label>Pessoa Jurídica</label> 
		</div>
		
		<div class="form-group">
			<label>Nome</label><br>
			<input name="nome" size="150">
		</div>

		<div class="form-group">
			<label>Telefone</label><br>
			<input name="ddd" size="2" type="number" step="00">  <input name="telefone" type="number">
		</div>

		<div class="form-group">
			<label>Endereço</label><br>
			<input name="endereco" size="150">
		</div>	

		<div class="form-group">
			<label>E-mail</label><br>
			<input name="email" size="30">
		</div>	
		
		<div class="form-group">
			<button type="submit" class="btn
			btn-primary ">OK</button>
		</div>
	</form>
</div>

@stop
