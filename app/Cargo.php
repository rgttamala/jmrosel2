<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function cargo() {
        return $this->belongsTo('App\Transaction', 'cargo_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    
    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function helper(){
        return $this->belongsTo(Helper::class, 'helper_id');
    }

}
