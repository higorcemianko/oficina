<?php

namespace oficina;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    public function ordens(){
        return $this->hasMany('ofcina\Ordem');
    }
}
