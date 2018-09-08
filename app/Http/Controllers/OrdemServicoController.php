<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Ordem;
	use oficina\OrdemServico;	
	use Auth;
	use Request;
	use oficina\Servico;

	class OrdemServicoController extends Controller{
		public function __construct(){

		}

		public function novo($id){
			$servicos = servico::all();
			return view('ordensservicos.formulario')->with(array('servicos'=>$servicos, 'ordem'=>$id));
		}

		public function lista($id){
			$ordem = Ordem::find($id);
			$ordensservicos = DB::select('select os.*, s.descricao, s.codigo from servicos s inner join ordens_servicos os on s.id = os.id_servico where os.id_ordem = ?', [$id]);
			return view('ordensservicos.lista')->with(array('ordensservicos'=>$ordensservicos, 'ordem'=>$ordem));	
		}

		public function adiciona($id){
			
			$ordemservico = new OrdemServico();
			$ordemservico->id_ordem = $id;
			$ordemservico->id_servico = Request::input('id_servico');
			$servico = Servico::find($ordemservico->id_servico);
			$ordemservico->tempo = Request::input('tempo');
			$ordemservico->total = $ordemservico->tempo * $servico->valor;
			$ordemservico->desconto = Request::input('desconto');
			$ordemservico->total_liquido = $ordemservico->total - $ordemservico->desconto;

			$ordemservico->save();

			$ordem = Ordem::find($id);
			$ordem->total = $ordem->total + $ordemservico->total_liquido;

			$ordem->save();

			return redirect()
				->action('OrdemServicoController@lista', ['id' => $id]);
		}

		public function confirmaExclusao($id){
			$ordemservico = OrdemServico::find($id);
			if(empty($ordemservico)){
				return ('Servico inválido!');
			}
			$servico = Servico::find($ordemservico->id_ordem);
			return view('ordensservicos.confirmaexclusao')->with(array('id'=>$ordemservico->id, 'descricao'=>$servico->descricao));
		}

		public function remove($id){
			$ordemservico = OrdemServico::find($id);
			$ordem = Ordem::find($ordemservico->id_ordem);
			$ordem->total = $ordem->total - $ordemservico->total_liquido;
			$ordemservico->delete();
			$ordem->save();

			return redirect()
				->action('OrdemServicoController@lista', ['id' => $ordem->id]);
		}

		


	}