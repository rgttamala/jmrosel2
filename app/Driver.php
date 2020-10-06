<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function driver() {
        return $this->belongsTo('App\Transaction', 'driver_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function driverpayrolls()
    {
    return $this->hasMany(DriverPayroll::class);
    }

    
}
