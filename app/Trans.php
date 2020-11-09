<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
    protected $fillable = ['cargo_id'];


    public function cargo(){
    return $this->belongsTo(Cargo::class, 'cargo_id');
    }
}
