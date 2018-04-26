<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreeWithdraw extends Model
{
    public function freelancer(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
