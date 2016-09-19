<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function mountains()
    {
        return $this->belongsToMany('App\Mountain')->withTimestamps();
    }

    public function climbers()
    {
        return $this->belongsToMany('App\Climber')->withTimestamps();
    }

    public function ranges()
    {
        return $this->belongsToMany('App\Range')->withTimestamps();
    }
}
