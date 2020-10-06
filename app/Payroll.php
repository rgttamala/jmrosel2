<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;


class Payroll extends Model
{
    protected $fillable = ['payperiodstart'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
