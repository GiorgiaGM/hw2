<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Opera extends Model
{
    protected $table = 'opera';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany("App\Models\User");
    }
}