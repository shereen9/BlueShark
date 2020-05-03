<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\branch');
    }
}
