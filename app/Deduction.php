<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{

    protected $table = "driver_payroll";

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function rates(){
        return $this->belongsTo(DriverPayroll::class, 'driver_rates_id');
    }

   public function driverrates()
   {
       return $this->hasMany(DriverPayroll::class);
   }

     
        

}
