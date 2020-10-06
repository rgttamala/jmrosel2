<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['cargo_id'];


    public function cargo(){
    return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    

}
