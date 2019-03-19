<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel_cargo extends Model
{
    protected $fillable = [
        'nombre','nivel'
    ];
    public function cargos(){
        return $this->hasMany('App\Cargo');
    }
}
