<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_empresa extends Model
{
    public function empresas(){
        return $this->HasMany('App\Empresa');
    }
}
