<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance() {
        return $this->belongsTo('App\Check', 'attendance_id', 'id');
    }
}
