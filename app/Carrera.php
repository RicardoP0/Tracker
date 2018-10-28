<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function personas(){
        return $this->belongsToMany('App\Carrera');
    }

    public function universidad(){
        return $this->belongsTo('App\Universidad');
    }
}
