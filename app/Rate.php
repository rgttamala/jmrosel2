<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }

}
