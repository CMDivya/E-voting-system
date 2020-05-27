<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends App
{
    public function User()
    {
    return $this->belongsTo('App\User');
     }
     public function Candidate()
     {
         return $this->belongsTo('App\Candidate');
     }
}
