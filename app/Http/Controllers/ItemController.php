<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Item;
	use Request;
	use Auth;
	use oficina\Http\Requests\ItensRequest;

	class ItemController extends Controller{
		public function __construct(){

		}

		public function novo(){
			return view('itens.formulario');
		}

		public function adiciona(ItensRequest $request){
			
			$item = new Item();
			$item->codigo = $request->input('codigo');
			$item->descricao = $request->input('descricao');
			$item->valor = $request->input('valor');
			$item->save();

			return view('mensagens.sucesso')->with('mensagem', 'Item adicionado com sucesso!');
		}

		public function lista(){
			$itens = Item::all();
			return view('itens.lista')->with('itens', $itens);
		}

	}