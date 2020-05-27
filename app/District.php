<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends App
{
    public function State()
    {
        return $this->belongsTo('App\State');
    }
    public function Users()
    {
    return $this->hasMany('App/User');
     }
     public function Candidates()
     {
     return $this->hasMany('App/Candidate');
      }
      public function Seats()
      {
      return $this->hasMany('App/Seats');
       }

}
