<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobPost extends Model
{
    protected $fillable = [
        'p_title','p_category_id','p_description','p_joblevel_id','p_jobskill',
        'p_sdate','p_edate','p_less','p_ratetype_id','p_buddget','status'
    ];

    public static function cancel()
    {
        return self::where('status',4); 
    }
    public function projectPayment() 
    {
        return $this->hasMany('App\Model\ProjectPayment', 'job_post_id');
    }
    public function deposit() 
    {
        return $this->hasMany('App\Model\ProjectPayment', 'job_post_id')->projectPay();
    }
    public function projectcat() 
    {
    	return $this->belongsTo('App\Model\ProjectCategory','p_category_id');
    }

    public function joblevel() 
    {
    	return $this->belongsTo('App\Model\JobLevel','p_joblevel_id');
    }

    public function ratetype() 
    {
    	return $this->belongsTo('App\Model\ProjectType','p_ratetype_id');
    }
    public function jobpostclient() 
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function jobapply() 
    {
        return $this->hasMany('App\Model\JobApply');
    }

    // public function jobDecline()
    // {
    //     $this->update(['job_apply_status' => config('jobApplyStatus.jobapply_status.applyCancel')]);
    // }
    public function hired() 
    {
        return $this->hasMany('App\Model\JobApply')->where('job_apply_status',config('jobApplyStatus.jobapply_status.jobHire'));
    }
    public function clienfile() 
    {
        return $this->hasMany('App\Model\ClinetFile','post_idc');
    }
    public function chats()
    {
        return $this->hasMany(\App\Chat::class);
    }
}
