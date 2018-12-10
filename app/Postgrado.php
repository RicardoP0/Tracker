<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
    protected $fillable = [
        'nombre','fecha_obtencion','tipoPostgrado_id','persona_id','universidad_id'
    ];

    public function persona(){
        return $this->BelongsTo('App\Postgrado');
    }
    public function universidad(){
        return $this->belongsTo('App\Universidad');
    }
    public function tipo(){
        return $this->belongsTo('App\TipoPostgrado','tipoPostgrado_id');
    }
}
