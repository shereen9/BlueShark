<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\branch');
    }

    public function sport()
    {
        return $this->belongsTo('App\sport');
    }

    public function trainer()
    {
        return $this->belongsTo('App\trainer');
    }
}
