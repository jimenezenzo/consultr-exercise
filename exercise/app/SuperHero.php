<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    protected $guarded = [];

    public function race()
    {
        return $this->hasOne('App\Race', 'id', 'race_id');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher', 'id', 'publisher_id');
    }
}
