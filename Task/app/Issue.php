<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function Customer(){
    	return $this->belongsTo('App\Customer');
    }
    public function Employee(){
    	return $this->belongsTo('App\User');
    }
}
