<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'fecha_inicio', 'fecha_termino', 'sueldo', 'nivel_cargo_id', 'empresa_id', 'area_id'
    ];

    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    public function area(){
        return $this->belongsTo('App\Area');
    }

    public function nivel_cargo(){
        return $this->belongsTo('App\Nivel_cargo');
    }
    public function otro_area(){
        return $this->hasOne('App\Otro_area');
    }

}
