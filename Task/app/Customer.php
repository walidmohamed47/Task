<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function Issue(){
    	return $this->hasMany('App\Issue');
    }
}
