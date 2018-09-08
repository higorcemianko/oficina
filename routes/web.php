<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function()
{
	Route::get('/clientes/novo', 'ClienteController@novo');
	Route::post('/clientes/adiciona', 'ClienteController@adiciona');
	Route::get('/clientes/lista', 'ClienteController@lista');

	Route::get('/veiculos/novo', 'VeiculoController@novo');
	Route::post('/veiculos/adiciona', 'VeiculoController@adiciona');
	Route::get('/veiculos/lista', 'VeiculoController@lista');

	Route::get('/produtivos/novo', 'ProdutivoController@novo');
	Route::post('/produtivos/adiciona', 'ProdutivoController@adiciona');

	Route::get('/itens/novo', 'ItemController@novo');
	Route::post('/itens/adiciona', 'ItemController@adiciona');
	Route::get('/itens/lista', 'ItemController@lista');

	Route::get('/servicos/novo', 'ServicoController@novo');
	Route::post('/servicos/adiciona', 'ServicoController@adiciona');
	Route::get('/servicos/lista', 'ServicoController@lista');

	Route::get('/ordens/nova', 'OrdemController@nova');
	Route::post('/ordens/adiciona', 'OrdemController@adiciona');
	Route::get('/ordens/detalhes/{ordem}', 'OrdemController@detalhes')->where('ordem', '[0-9]+');
	Route::get('/ordens/lista', 'OrdemController@lista');
	Route::get('/ordens/enviaemail/{id}', 'OrdemController@enviaEmail')->where('id', '[0-9]+');

	Route::get('/ordensitens/novo/{id}', 'OrdemItemController@novo')->where('id', '[0-9]+');
	Route::post('/ordensitens/adiciona/{id}', 'OrdemItemController@adiciona')->where('id', '[0-9]+');
	Route::get('/ordensitens/lista/{id}', 'OrdemItemController@lista')->where('id', '[0-9]+');
	Route::get('/ordensitens/confexcl/{id}', 'OrdemItemController@confirmaExclusao')->where('id', '[0-9]+');
	Route::get('/ordensitens/remove/{id}', 'OrdemItemController@remove')->where('id', '[0-9]+');

	Route::get('/ordensservicos/novo/{id}', 'OrdemServicoController@novo')->where('id', '[0-9]+');
	Route::post('/ordensservicos/adiciona/{id}', 'OrdemServicoController@adiciona')->where('id', '[0-9]+');
	Route::get('/ordensservicos/lista/{id}', 'OrdemServicoController@lista')->where('id', '[0-9]+');
	Route::get('/ordensservicos/confexcl/{id}', 'OrdemServicoController@confirmaExclusao')->where('id', '[0-9]+');
	Route::get('/ordensservicos/remove/{id}', 'OrdemServicoController@remove')->where('id', '[0-9]+');


});