<?php

namespace App;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    public function helper() {
        return $this->belongsTo('App\Transaction', 'helper_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
