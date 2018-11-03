<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function Empresa(){
        return $this->belongsTo('App\Empresa');
    }

    public function Area(){
        return $this->belongsTo('App\Area');
    }

    public function NivelCargo(){
        return $this->belongsTo('App\Nivel_cargo');
    }

}
