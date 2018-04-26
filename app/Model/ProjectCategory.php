<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    public function jobpost() {
    	return $this->hasMany('App\Model\JobPost');
    }

    public function clienfreel() {
    	return $this->hasMany('App\Model\ClientFreelancer');
    }
}
