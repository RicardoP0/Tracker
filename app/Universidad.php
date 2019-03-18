<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = 'universidades';
    protected $fillable = [
        'nombre','sede',
    ];

    public function carreras(){
        return $this->HasMany('App\Carrera');
    }
    public function postgrados(){
        return $this->HasMany('App\Postgrado');
    }

}
