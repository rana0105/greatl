<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
		use Notifiable, HasRoles;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'name', 'username', 'email', 'role_idg', 'password','is_activated',
		];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password', 'remember_token',
		];

		// public function freelancer()
		// {
		// 		return $this->hasOne(App\Model\ClientFreelancer::class);
		// }
		
		public function posts()
		{
			return $this->hasMany(Post::class);
		}

		public function profilePic()
		{
			return $this->hasOne(\App\Model\ClientFreelancer::class,'user_idu')->select('p_image');
		}

		public function clientjobpost()
		{
			return $this->hasMany('App\Model\JobPost', 'user_id');
		}

		public function freelancerRating()
		{
			return $this->hasMany(\App\Model\FreeRating::class,'freelancer_idrf');
		}

		public function freelencerApply()
		{
			return $this->hasMany('App\Model\JobApply', 'freelancer_id');
		}

		public function freelencer()
		{
			return $this->hasOne(\App\Model\ClientFreelancer::class, 'user_idu');
		}

		public function senderChat()
		{
			return $this->hasMany(\App\Model\Chat::class, 'user_id');
		}

		public function reciverChat()
		{
			return $this->hasMany(\App\Model\Chat::class, 'reciver_id');
		}

		public function fileclient()
		{
			return $this->hasMany('App\Model\ClinetFile');
		}

		public function clientPayment()
		{
			return $this->hasMany('App\Model\FreePayment', 'user_id');
		}

		public function freelancerPayment()
		{
			return $this->hasMany('App\Model\FreePayment', 'freelancer_id');
		}
}
