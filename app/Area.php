<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function Cargos(){
        return $this->hasMany('App\Cargo');
    }
}
