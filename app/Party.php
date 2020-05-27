<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends App
{
    public function Candidates()
    {
        return $this->hasMany('App\Candidate');
    }
}
