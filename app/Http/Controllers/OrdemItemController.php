<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Ordem;
	use oficina\OrdemItem;	
	use Auth;
	use Request;
	use oficina\Item;

	class OrdemItemController extends Controller{
		public function __construct(){

		}

		public function novo($id){
			$itens = Item::all();
			return view('ordensitens.formulario')->with(array('itens'=>$itens, 'ordem'=>$id));
		}

		public function lista($id){
			$ordem = Ordem::find($id);
			$ordensitens = DB::select('select oi.*, i.descricao, i.codigo from itens i inner join ordens_itens oi on i.id = oi.id_item where oi.id_ordem = ?', [$id]);
			return view('ordensitens.lista')->with(array('ordensitens'=>$ordensitens, 'ordem'=>$ordem));	
		}

		public function adiciona($id){
			
			$ordemitem = new OrdemItem();
			$ordemitem->id_ordem = $id;
			$ordemitem->id_item = Request::input('id_item');
			$item = Item::find($ordemitem->id_item);
			$ordemitem->quantidade = Request::input('quantidade');
			$ordemitem->total = $ordemitem->quantidade * $item->valor;
			$ordemitem->desconto = Request::input('desconto');
			$ordemitem->total_liquido = $ordemitem->total - $ordemitem->desconto;

			$ordemitem->save();

			$ordem = Ordem::find($id);
			$ordem->total = $ordem->total + $ordemitem->total_liquido;

			$ordem->save();

			return redirect()
				->action('OrdemItemController@lista', ['ordem' => $ordem]);
		}

		public function confirmaExclusao($id){
			$ordemitem = OrdemItem::find($id);
			if(empty($ordemitem)){
				return ('Item inválido!');
			}
			$item = Item::find($ordemitem->id_ordem);
			return view('ordensitens.confirmaexclusao')->with(array('id'=>$ordemitem->id, 'descricao'=>$item->descricao));
		}

		public function remove($id){
			$ordemitem = OrdemItem::find($id);
			$ordem = Ordem::find($ordemitem->id_ordem);
			$ordem->total = $ordem->total - $ordemitem->total_liquido;
			$ordemitem->delete();
			$ordem->save();

			return redirect()
				->action('OrdemItemController@lista', ['id' => $ordem->id]);
		}


		


	}