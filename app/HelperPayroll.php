<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelperPayroll extends Model
{
    protected $table = "helper_payroll";

    public function helper(){
        return $this->belongsTo(Helper::class, 'helper_id');
    }


   public function helperrates()
   {
       return $this->hasMany(HelperPayroll::class);
   }


}

