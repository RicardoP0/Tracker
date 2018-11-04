<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function personas(){
        return $this->Belongsto('App\Persona');
    }
    public function tipo_empresa(){
        return $this->BelongsTo('App\Tipo_empresa');
    }
    public function cargos(){
        return $this->HasMany('App\Cargo');
    }
}
