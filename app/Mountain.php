<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    public function countries()
    {
        return $this->belongsToMany('App\Country');
    }

    public function summits()
    {
        return $this->hasMany('App\Summit');
    }

    public function routes()
    {
        return $this->hasMany('App\Route');
    }

    public function ranges()
    {
        return $this->belongsToMany('App\Range');
    }
}
