<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends App
{
    public function Candidates()
    {
        return $this->hasMany('App\Candidate');
    }
    public function District()
    {
        return $this->belongsTo('App\District');
    }

}