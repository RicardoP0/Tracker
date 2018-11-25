<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
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
