<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    public function mountains()
    {
        return $this->belongsToMany('App\Mountain');
    }

    public function countries()
    {
        return $this->belongsToMany('App\Country');
    }
}
