<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverPayroll extends Model
{
    protected $table = "driver_rates";

    protected $fillable=[
        'trip',
        'datetrip',
        'cargo',
        'rate',
        'cashadvance',
        'cadate',
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function deductions(){
        return $this->hasMany(Deduction::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function payroll(){
        return $this->belongsTo(Deduction::class, 'payroll_id');
    }
    
}
