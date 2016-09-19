<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function mountains()
    {
        return $this->belongsToMany('App\Mountain');
    }

    public function climbers()
    {
        return $this->belongsToMany('App\Climber');
    }

    public function ranges()
    {
        return $this->belongsToMany('App\Range');
    }
}
