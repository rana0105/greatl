<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientFreelancer extends Model
{
	// public function getRouteKeyName()
	// {
	//     return 'name';
	// }
	// public function user()
	// {
	// 	return $this->belongsTo('App\User', 'user_idu');
	// }

	public function language()
	{
		return $this->hasMany(\App\Model\Language::class,'user_idl', 'user_idu');
	}

    public function projectcats() 
    {
    	return $this->belongsTo('App\Model\ProjectCategory','category');
    }
}
