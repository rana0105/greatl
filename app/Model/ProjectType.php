<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    public function jobpost() {
    	return $this->hasMany('App\Model\JobPost');
    }
}
