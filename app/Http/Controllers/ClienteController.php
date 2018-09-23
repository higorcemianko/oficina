<?php namespace oficina\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use oficina\Cliente;
	use Auth;
	use oficina\Http\Requests\ClientesRequest;
	use Illuminate\Support\Facades\Request;

	class ClienteController extends Controller{
		public function __construct(){
			$this->middleware('nosso-middleware', 
        ['only' => ['lista']]);

		}

		public function novo(){
			return view('clientes.formulario');
		}

		public function adiciona(ClientesRequest $request){
			
			Cliente::create($request->all());

			/*$cliente->cpfcnpj = $request->input('cpfcnpj');
			$cliente->tipopessoa = $request->input('tipopessoa');
			$cliente->nome = $request->input('nome');
			$cliente->ddd = $request->input('ddd');
			$cliente->telefone = $request->input('telefone');
			$cliente->endereco = $request->input('endereco');
			$cliente->email = $request->input('email');			
			$cliente->save();

			return view('mensagens.sucesso')->with('mensagem', 'Cliente adicionado com sucesso!');*/
			return redirect()
            ->action('ClienteController@lista')
            ->withInput(Request::only('nome'));
		}

		public function lista(){
			$clientes = Cliente::all();
			return view('clientes.lista')->with('clientes', $clientes);
		}


	}