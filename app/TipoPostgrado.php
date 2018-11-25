<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPostgrado extends Model
{
    public function postgrado(){
        return $this->HasMany('App\Postgrado');
    }
}
