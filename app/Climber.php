<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Climber extends Model
{

    public function summits()
    {
        return $this->belongsToMany('App\Summit')->withTimestamps();
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team')->withTimestamps();
    }

    public function countries()
    {
        return $this->belongsToMany('App\Country')->withTimestamps();
    }
}
