<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $timestamps = false;

    public function opere()
    {
        return $this->hasMany("App\Models\Opera", "user");
    }

    public function eventi(){
        return $this->hasMany("App\Models\Evento","user");
    }



}
