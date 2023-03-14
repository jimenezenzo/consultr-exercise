<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function superheroes()
    {
        return $this->hasMany('App\SuperHero');
    }
}
