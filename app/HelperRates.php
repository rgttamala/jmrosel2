<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelperRates extends Model
{
    protected $table = "helper_rates";

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

    public function helperpayroll(){
        return $this->hasMany(HelperPayroll::class);
    }

    public function helper(){
        return $this->belongsTo(Helper::class, 'helper_id');
    }

    public function payroll(){
        return $this->belongsTo(HelperPayroll::class, 'payroll_id');
    }

}
