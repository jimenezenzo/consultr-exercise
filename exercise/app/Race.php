<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $guarded = [];

    public function superheroes()
    {
        return $this->hasMany('App\SuperHero');
    }
}
