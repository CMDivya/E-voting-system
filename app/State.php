<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends App
{
    public function Districts(){ 
    return $this->hasMany('App\District');
    }
    
}
