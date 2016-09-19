<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function mountain()
    {
        return $this->belongsTo('App\Mountain');
    }
}
