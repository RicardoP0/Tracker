<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel_cargo extends Model
{
    public function Cargos(){
        return $this->hasMany('App\Cargo');
    }
}
