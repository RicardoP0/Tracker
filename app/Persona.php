<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre', 'rut', 'genero','fecha_nacimiento','user_id'
    ];

    public function user(){
        return $this->BelongsTo('App\User');
    }

    public function postgrados(){
        return $this->HasMany('App\Postgrado');
    }

    public function empresas(){
        return $this->HasMany('App\Empresa');
    }

    public function carreras(){
        return $this->belongsToMany('App\Carrera')->withPivot('tipo_tesis',
            'fecha_ingreso','fecha_egreso','fecha_titulacion');
    }
}
