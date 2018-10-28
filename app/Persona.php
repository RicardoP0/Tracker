<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function user(){
        return $this->BelongsTo('App\User');
    }

    public function postgrados(){
        return $this->HasMany('App\Postgrado');
    }
}
