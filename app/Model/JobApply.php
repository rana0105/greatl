<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{

    protected $fillable = ['job_post_id','freelencer_id', 'bidamount','getpaid', 'taketime','coverletter','milestone','mile_des','job_apply_status'];

    public function hiredAction()
    {
        $this->update(['job_apply_status' => config('jobApplyStatus.jobapply_status.jobHire')]);
    }

    public function cancelAction()
    {
        $this->update(['job_apply_status' => config('jobApplyStatus.jobapply_status.applyCancel')]);
    }

     public function scopeHired($query)
    {
        return $query->where('job_apply_status',config('jobApplyStatus.jobapply_status.jobHire'));
    }

    public function postjob() 
    {
    	return $this->belongsTo('App\Model\JobPost','job_post_id');
    }

    public function jobapplyfree() 
    {
        return $this->belongsTo('App\User','freelancer_id');
    }

    public function freelencer() 
    {
        return $this->belongsTo('App\Model\ClientFreelancer','freelancer_id','user_idu');
    }

    public function freeappfile() {
    	return $this->hasMany('App\Model\FreeFile', 'apply_idf');
    } 
}


