<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function persona(){
        return $this->Belongsto('App\Persona');
    }
    public function tipo_empresa(){
        return $this->BelongsTo('App\Tipo_empresa');
    }
    public function rubro(){
        return $this->BelongsTo('App\Rubro');
    }
    public function cargos(){
        return $this->HasMany('App\Cargo');
    }
}
