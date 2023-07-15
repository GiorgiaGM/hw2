<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Evento extends Model
{
    protected $table = 'evento';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany("App\Models\User");
    }
}