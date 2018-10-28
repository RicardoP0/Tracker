<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function personas(){
        return $this->HasMany('App\Persona');
    }
    public function tipo_empresa(){
        return $this->BelongsTo('App\Tipo_empresa');
    }
}
