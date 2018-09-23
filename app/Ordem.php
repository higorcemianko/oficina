<?php

namespace oficina;

use Illuminate\Database\Eloquent\Model;

class Ordem extends Model{
	protected $table = 'ordens';

	protected $fillable = array('data_abertura', 
    'descricao', 'km', 'cqncelada', 'total',
    'id_veiculo');
	protected $guarded = ['id'];
    //
    public function veiculo(){
        return $this->belongsTo('oficina\Veiculo');
    }
}
