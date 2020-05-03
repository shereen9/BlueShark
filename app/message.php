<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    public function from()
    {
        return $this->belongsTo('App\User');
    }
}
