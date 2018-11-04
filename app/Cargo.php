<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    public function area(){
        return $this->belongsTo('App\Area');
    }

    public function nivel_cargo(){
        return $this->belongsTo('App\Nivel_cargo');
    }

}
