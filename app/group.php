<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\branch');
    }
}
