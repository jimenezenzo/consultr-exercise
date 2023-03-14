<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    public function race()
    {
        return $this->hasOne('App\Race');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher');
    }
}
