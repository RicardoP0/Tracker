<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otro_area extends Model
{
    protected $fillable = [
        'nombre_area',
    ];

    public function cargo(){
        return $this->belongsTo('App\Cargo');
    }
}
