<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function climbers()
    {
        return $this->belongsToMany('App\Climber')->withTimestamps();
    }
}
