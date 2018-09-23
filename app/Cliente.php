<?php

namespace oficina;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
	protected $fillable = array('cpfcnpj', 
    'tipopessoa', 'nome', 'ddd', 'telefone',
    'endereco', 'email');
    protected $guarded = ['id'];
}
