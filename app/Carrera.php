<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function personas(){
        return $this->belongsToMany('App\Carrera')->withPivot('tipo_tesis',
            'fecha_ingreso','fecha_egreso','fecha_titulacion');
    }

    public function universidad(){
        return $this->belongsTo('App\Universidad');
    }
}
