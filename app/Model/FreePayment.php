<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreePayment extends Model
{
    public function project()
    {
    	return $this->belongsTo('App\Model\JobPost', 'job_post_id');
    }

    public function client()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function freelancer()
    {
    	return $this->belongsTo('App\User', 'freelancer_id');
    }
}
