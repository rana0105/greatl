<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['user_id','reciver_id','job_post_id','message'];

    public function Client()
    {
    	return $this->belongsTo(\App\User::class, 'user_id');
    }
    public function reciver()
    {
    	return $this->belongsTo(\App\User::class, 'reciver_id');
    }
    public function project()
    {
    	return $this->belongsTo(\App\JobPost::class, 'job_post_id ');
    }
}
