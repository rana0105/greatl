<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreeRating extends Model
{
    public function freelancerFeedback()
		{
			return $this->belongsTo(\App\Model\JobApply::class,'freelancer_idrf', 'freelancer_id');
		}
    public function jobTitle()
		{
			return $this->belongsTo(\App\Model\JobPost::class,'job_idrf', 'id');
		}
}
