<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Veiculo;
	use oficina\Cliente;
	use Request;
	use Auth;
	use oficina\Http\Requests\VeiculosRequest;

	class VeiculoController extends Controller{
		public function __construct(){

		}

		public function novo(){
			$clientes = Cliente::all();
			return view('veiculos.formulario')->with('clientes', $clientes);
		}

		public function adiciona(VeiculosRequest $request){
			
			$veiculo = new Veiculo();
			$veiculo->placa = $request->input('placa');
			$veiculo->marca = $request->input('marca');
			$veiculo->modelo = $request->input('modelo');
			$veiculo->cor = $request->input('cor');
			$veiculo->km = $request->input('km');
			$veiculo->proprietario = $request->input('proprietario');
			$veiculo->save();

			return view('mensagens.sucesso')->with('mensagem', 'Veiculo adicionado com sucesso!');
		}

		public function lista(){
			$veiculos = DB::select('select v.*, c.nome from veiculos v left join clientes c on v.proprietario = c.id');
			return view('veiculos.lista')->with('veiculos', $veiculos);
		}


	}