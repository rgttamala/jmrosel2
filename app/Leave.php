<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leave() {
        return $this->belongsTo('App\Check', 'leave_id', 'id');
    }

}
