<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    public function jobpost() {
    	return $this->hasMany('App\Model\JobPost');
    }
}
