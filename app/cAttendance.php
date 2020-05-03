<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cAttendance extends Model
{
    public function sport()
    {
        return $this->belongsTo('App\sport');
    }
}
