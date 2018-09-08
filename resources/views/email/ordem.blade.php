<div class="container">
	<h1>Ordem de Serviço: {{$ordem->id}} </h1>
	<table class="table table-striped table-bordered table-hover" style="width:100%" >
		<tr style="background-color:#808080">
			<th><b>Dados do Veículo</b></th>
		</tr>
		<tr>
			<th>
				<li>
					<b>Placa:</b> {{$veiculo->placa}}
				</li>
				<li>
					<b>Marca:</b> {{$veiculo->marca}}
				</li>
				<li>
					<b>Modelo:</b> {{$veiculo->modelo}}
				</li>
				<li>
					<b>Cor:</b> {{$veiculo->cor}}
				</li>
				<li>
					<b>KM:</b> {{$ordem->km}}
				</li>
				
			</th>	
		</tr>
		<tr style="background-color:#808080">
			<th><b>Dados do Cliente</b></th>
		</tr>
		<tr>
			<th>
				@if ($cliente->tipopessoa == 1)
					<li>
						<b>CPF:</b> {{$cliente->cpfcnpj}}
					</li>
				@else
					<li>
						<b>CNPJ:</b> {{$cliente->cpfcnpj}}
					</li>
				@endif
				<li>
					<b>Nome:</b> {{$cliente->nome}}
				</li>
				<li>
					<b>Telefone:</b> ({{$cliente->ddd}}) {{$cliente->telefone}}
				</li>
				<li>
					<b>Endereço:</b> {{$cliente->endereco}}
				</li>
				
			</th>
		</tr>
		<tr style="background-color:#808080">
			<th><b>Descrição</b></th>
		</tr>
		<tr>
			<th>
				<li>
					{{$ordem->descricao}}
				</li>	
			</th>
		</tr>

		<tr >
			<th>
				Total: {{$ordem->total}}
			</th>
		</tr>
			
	</table>
	
</div>
