<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends App
{
    public function Party()
    {
        return $this->belongsTo('App\Party');

           }
    public function District()
        {
         return $this->belongsTo('App\District');
       
         }
         public function Votes()
        {
            return $this->hasMany('App\Vote');
        }
        public function Seat()
        {
            return $this->belongsTo('App\Seat');
        }

}
