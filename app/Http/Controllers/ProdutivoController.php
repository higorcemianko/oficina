<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Produtivo;
	use Request;
	use Auth;
	use oficina\Http\Requests\ProdutivosRequest;

	class ProduivoController extends Controller{
		public function __construct(){

		}

		public function novo(){
			return view('produtivos.formulario');
		}

		public function adiciona(ProdutivosRequest $request){
			
			$produtivo = new Produtivo();
			$produtivo->cpf = $request->input('cpf');
			$produtivo->nome = $request->input('nome');
			$produtivo->funcao = $request->input('funcao');
			$produtivo->save();

			return view('mensagens.sucesso')->with('mensagem', 'Produtivo adicionado com sucesso!');
		}


	}