<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function superheroes()
    {
        return $this->hasMany('App\SuperHero');
    }
}
