<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\branch');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\group');
    }
}
