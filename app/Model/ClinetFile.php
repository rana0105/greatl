<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClinetFile extends Model
{
    public function clientfileup() 
    {
    	return $this->belongsTo('App\Model\JobPost','post_idc');
    }

    public function clientfileid() 
    {
    	return $this->belongsTo('App\User','user_idc');
    }
}
