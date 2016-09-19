<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Summit extends Model
{
    public function mountain()
    {
        return $this->belongsTo('App\Mountain');
    }

    public function climbers()
    {
        return $this->belongsToMany('App\Climber');
    }

    public function route()
    {
        return $this->hasOne('App\Route');
    }
}
