<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revenue extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
