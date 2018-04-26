<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProjectPayment extends Model
{
	protected $fillable = ['user_id', 'payment', 'payment_id', 'token', 'PayerID', 'merchant_id', 'merchant_email', 'currency', 'payment_create'];
    public function job()
    {
        return $this->belongsTo(App\Model\JobPost::class);
    }

    public function scopeProjectPay($query)
    {
    	return $query->where('user_id',Auth::user()->id);
    }
}
