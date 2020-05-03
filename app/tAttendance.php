<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tAttendance extends Model
{
    public function trainer()
    {
        return $this->belongsTo('App\trainer');
    }
}
