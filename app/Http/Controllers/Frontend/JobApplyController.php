<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\ClientRating;
use App\Model\FreeFile;
use App\Model\FreeRating;
use App\Model\JobApply;
use App\Model\JobPost;
use App\Model\ServiceFee;
use App\Notifications\ApplyNotify;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class JobApplyController extends Controller
{
    // public function apply(Request $request, JobPost $project)
    // {
    //     $project->jobpostclient->notify(new ApplyNotify($project,$request->user()));
    // }

    public function postApplyjob(Request $request, JobPost $project)
    {
        if(!Auth::user()->freelencerApply()->where('job_post_id',$project->id)->first())
        {
            $apply = Auth::user()->freelencerApply()->create($request->all()+['job_post_id' => $project->id]);

            if($request->hasFile('a_file'))
            {
                $this->saveApplyFiles($apply, $request->file('a_file'));
            }
            $project->jobpostclient->notify(new ApplyNotify($project,$request->user()));
            return redirect()->route('projec')->with('success', 'Job apply have done successfully!');
        }

        return redirect()->route('projec')->with('warning', 'This job have already applied');
    }

    private function saveApplyFiles($jobApplyId, $files)
    {
        if ($files) {
            foreach ($files as $file)
            {
                $filename = rand(10,100) . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'app_images/resize_images/';
                $file->move($destinationPath, $filename);

                $ffile = new FreeFile;
                $ffile->user_idf  = Auth::user()->id;
                $ffile->apply_idf = $jobApplyId->id;
                $ffile->f_file = $filename;
                $ffile->save();
            }
            return true;
        }
        return false;
    }

    public function hireForJob(Request $request, $applyId)
    {
        $apply = JobApply::findOrFail($applyId);
        $project = JobPost::where('id', $apply->job_post_id)->first();
        $apply->hiredAction();
        $apply->jobapplyfree->notify(new ApplyNotify($project, $request->user(), 1));
        return redirect()->route('client.project.details', $apply->job_post_id)->with('success-hired', 'Freelancer successfully hired for your project !');
    }

    public function cancelForJob(Request $request, $applyId)
    {
        $apply = JobApply::findOrFail($applyId)
                ->where('job_post_id', $request->jobpost_id)
                ->where('freelancer_id', $request->freelancer_id)->first();

        $project = JobPost::where('id', $apply->job_post_id)->first();
        $apply->cancelAction();
        $apply->jobapplyfree->notify(new ApplyNotify($project, $request->user(), 0));
        return redirect()->route('client.project.details', $apply->job_post_id)->with('success-hired', 'Freelancer successfully cancel for your project !');
    }

    public function getReview($id)
    {
        $jobreview = JobPost::join('job_applies', 'job_applies.job_post_id', '=', 'job_posts.id')->where('job_applies.id', $id)->first();
       // dd($jobreview);
        $freeid = $jobreview->freelancer_id;
      // $freeid = Auth::user()->id;
        $rating = DB::table('client_ratings')->where('freelancer_idr', $freeid)->average('rating');
       // dd($rating);
        return view('freelance.review')->withJreview($jobreview)->withRating($rating);
    }

    public function postReview(Request $request)
    {
        $clientrating = new ClientRating;
        $clientrating->job_idr = $request->job_post_id;
        $clientrating->jobap_idr = $request->jobapply_id;
        $clientrating->user_idr = $request->user_id;
        $clientrating->freelancer_idr = $request->freelancer_id;
        $clientrating->rating = $request->star;
        $clientrating->description = $request->description;

        $clientrating->save();

        return redirect()->route('review', $clientrating->jobap_idr)->with('success', 'Rating has been completed !');
    }
   
    public function getReviewfree($id, $freeid)
    {

        $jobreviewf = JobApply::join('job_posts', 'job_posts.id', '=', 'job_applies.job_post_id')->where('job_posts.id', $id)
            ->where('job_applies.freelancer_id', $freeid)->first();
        $freeid = $jobreviewf->freelancer_id;
        $rating = DB::table('free_ratings')->where('freelancer_idrf', $freeid)->average('ratingf');
        return view('freelance.reviewfree')
        ->withJreview($jobreviewf)
        ->withRating($rating);
    }


    public function postReviewfree(Request $request)
    {
        $freerating = new FreeRating;
        $freerating->job_idrf = $request->job_post_id;
        $freerating->jobap_idrf = $request->jobapply_id;
        $freerating->user_idrf = $request->user_id;
        $freerating->freelancer_idrf = $request->freelancer_id;
        $freerating->ratingf = $request->star;
        $freerating->descriptionf = $request->description;

        $freerating->save();

        return redirect()->route('freereview', [$freerating->job_idrf, $freerating->freelancer_idrf])->with('success', 'Rating has been completed !');
    }

    public function jobapplydelete($id)
    {
        $jobapply = Auth::user()
            ->freelencerApply()
            ->find($id);
        $jobapply->freeappfile()
            ->delete();
        $jobapply->delete();

        return redirect()->route('freelancer')->with('success', 'Bid has been successfully deleted');
    }

    public function getMessagef($project)
    {
        return view('freelance.messagebox', compact('project') );
    }
}
