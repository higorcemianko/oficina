<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Ordem;
	use oficina\Veiculo;
	use oficina\Cliente;
	use Auth;
	use oficina\Http\Requests\OrdensRequest;
	use Illuminate\Support\Facades\Mail;
	use oficina\Mail\OrdemServico;

	class OrdemController extends Controller{
		public function __construct(){

		}

		public function nova(){
			$veiculos = Veiculo::all();
			return view('ordens.formulario')->with('veiculos',$veiculos);
		}

		public function adiciona(OrdensRequest $request){

			//Ordem::create($request->all());
			
			$ordem = new Ordem();
			$ordem->id_veiculo = $request->input('id_veiculo');
			$ordem->descricao = $request->input('descricao');
			$ordem->data_abertura = date("Y/m/d");
			$ordem->km = $request->input('km');
				
			$ordem->save();


			$veiculo = Veiculo::find($request->input('id_veiculo'));
			$veiculo->km = $request->input('km');

			$veiculo->save();

			$cliente = Cliente::find($veiculo->proprietario);

			return view('ordens.detalhes')->with(array('ordem'=>$ordem, 'veiculo'=>$veiculo,'cliente'=>$cliente ));
			/*return redirect()
            ->action('OrdemController@lista');*/
		}

		public function detalhes($ordem){
			$ordem = Ordem::find($ordem);
			$veiculo = Veiculo::find($ordem->id_veiculo);
			$cliente = Cliente::find($veiculo->proprietario);
			return view('ordens.detalhes')->with(array('ordem'=>$ordem, 'veiculo'=>$veiculo,'cliente'=>$cliente ));
		}

		public function lista(){
			$ordens = DB::select('select o.*, c.nome, v.placa from ordens o
				                  left join veiculos v on o.id_veiculo = v.id 
				                  left join clientes c on v.proprietario = c.id');
			return view('ordens.lista')->with('ordens', $ordens);
		}

		public function enviaEmail($id){
			$ordem = Ordem::find($id);
			$veiculo = Veiculo::find($ordem->id_veiculo);
			$cliente = Cliente::find($veiculo->proprietario);

			Mail::to($cliente->email)->send(new OrdemServico($ordem));

			return view('ordens.detalhes')->with(array('ordem'=>$ordem, 'veiculo'=>$veiculo,'cliente'=>$cliente ));



		}


	}