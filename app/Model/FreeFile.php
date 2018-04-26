<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreeFile extends Model
{
    public function apfreefile() 
    {
    	return $this->belongsToMany('App\Model\JobApply','apply_idf');
    }

    public function apfreeuser() 
    {
    	return $this->belongsTo('App\User','user_idf');
    }
}
