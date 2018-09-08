<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Servico;
	use Request;
	use Auth;
	use oficina\Http\Requests\ServicosRequest;

	class ServicoController extends Controller{
		public function __construct(){

		}

		public function novo(){
			return view('servicos.formulario');
		}

		public function adiciona(ServicosRequest $request){
			
			$servico = new Servico();
			$servico->codigo = $request->input('codigo');
			$servico->descricao = $request->input('descricao');
			$servico->valor = $request->input('valor');
			$servico->save();

			return view('mensagens.sucesso')->with('mensagem', 'Servico adicionado com sucesso!');
		}

		public function lista(){
			$servicos = Servico::all();
			return view('servicos.lista')->with('servicos', $servicos);
		}


	}