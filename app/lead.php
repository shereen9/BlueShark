<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    public function sport()
    {
        return $this->belongsTo('App\sport');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
