<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Notifications\ApplyNotify;
use App\Model\JobPost;
use App\Model\ProjectCategory;
use App\Model\JobLevel;
use App\Model\ProjectType;
use App\Model\JobApply;
use App\Model\ClinetFile;
use App\Model\ClientFreelancer;
use App\Model\Language;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Storage;
use Image;
use Intervention\Image\ImageManager;
use DB;
use Auth;
use App\User;
use View;

class ProjectController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }
    
    public function getProjectview()
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $projects = JobPost::orderBy('id', 'desc')->paginate(30);
        $rate = ProjectType::all();
        $procat = ProjectCategory::all();
        return view('project.projectveiw')->withProjects($projects)->withRate($rate)->withNew($news)->withProcat($procat);
    }


    public function getProjectviewlog()
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $projects = JobPost::orderBy('id', 'desc')->paginate(10);
        $rate = ProjectType::all();
        $procat = ProjectCategory::all();
        return view('project.projectveiwlog')->withProjects($projects)->withRate($rate)->withNew($news)->withProcat($procat);
    }


    public function getProjectrate(Request $id)
    {

        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $rateid = $id->rtype;

        if($id->ajax()){
            $output ='';
            if($rateid == 0){
                $projects = JobPost::orderBy('id', 'desc')->paginate(10);
            }else{
                $projects = JobPost::where('p_ratetype_id', $rateid)->get();
            }
            
            if(sizeof($projects)>0){
                
                        foreach($projects as $pro){
                           
                        $second = Carbon::parse($pro->created_at)->diffInSeconds($news);
                        $dt = Carbon::now('Asia/Dhaka');
                        $days = $dt->diffInDays($dt->copy()->addSeconds($second));
                        $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
                        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));

                            $output .='<div class="porject-list-full-area single-porject-area mix overflow-fix">
                        <div class="row padding-o">
                            <div class="col-lg-10">
                                <div class="single-porject-single-item overflow-fix">
                                    <div class="single-porject-heading overflow-fix">
                                        <h2>' . $pro->p_title . '</h2>
                                    </div>
                                    <div class="single-porject-type overflow-fix">
                                    <?php 
                                    ?>
                                        <h6>' . $pro->ratetype->project_type . ' - ' . $pro->joblevel->job_level . '-' . 'Level ($$) - Est. Time:' .  $pro->p_less . '-' . '<span>Posted' .' '. CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() . ' ' . 'ago<span></h6>
                                    </div>
                                    <div class="single-porject-datalist overflow-fix">
                                         ' . str_limit(strip_tags($pro->p_description), 300) . '' . '...<a href="'. url('project-details', $pro->id) . '">Read More</a>
                                    </div>
                                    <div class="single-porject-skill overflow-fix">
                                        <p>Skills:</p>
                                        <ul>
                                            <li><i>' . $pro->p_jobskill . ',</i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center">
                                <div class="see-dtiles-button overflow-fix">
                                    <a href="' . url('project-details', $pro->id) . ' " class="grren-btn">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }


    public function getProjectpost()
    {
      $project_cat = ProjectCategory::all();
      $joblevel = JobLevel::all();
      $ratetype = ProjectType::all();

      return view('project.projectpost')->withProjectcat($project_cat)->withJoblevel($joblevel)->withRatetype($ratetype);
    }

    public function postProjectpost(Request $request)
    {
        $this->validate($request,[
            'p_file' => 'required|mimes:pdf'
        ]);
        // dd($request->all());
        $project = Auth::user()->clientjobpost()->create(
            $request->except('p_jobskill') + [
                'p_jobskill' => implode(',', $request->input('p_jobskill'))
            ]);

        if($request->hasFile('p_file'))
            $this->saveProjectFile( $project, $request->file('p_file'));
       
        return redirect()->route('project.payment', $project)
            ->with('success', 'Job has been successfully posted !');
    }

    protected function saveProjectFile($project, $files)
    {
        if ($files) {
            foreach ($files as $file) {
                $filename = rand(10,100) . time() . '.'
                            .$file->getClientOriginalExtension();
                $destinationPath = 'app_images/resize_images/';
                $file->move($destinationPath, $filename);

                $project->clienfile()->create([
                        'user_idc' => Auth::user()->id,
                        'c_file'   => $filename
                    ]);
            }
        }
    }

    public function getProjectdetails($id)
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $jobpost = JobPost::find($id);
        $totalpost = JobPost::where('user_id', $jobpost->user_id)->count();
        $spent = JobPost::where('user_id', $jobpost->user_id)->sum('p_buddget');
        $clientd = ClientFreelancer::where('user_idu', $jobpost->user_id)->first();
        $clietlan = Language::where('user_idl', $clientd->user_idu)->get();

        $jobap = JobApply::where('job_post_id', $id)->get();
            if(sizeof($jobap)>0){
                foreach ($jobap as $key => $value) {
                  $aplist = JobApply::join('client_freelancers', 'client_freelancers.user_idu', '=', 'job_applies.freelancer_id')
                  ->where('job_applies.job_post_id', $id)
                  ->get();
                  //dd($aplist);
                }
            }else{
                $aplist = null;
            }

        if(sizeof($aplist)>0){
            foreach ($aplist as $key => $valuer) {

               $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuer->user_idu)->average('ratingf');
               $valuer['ratingf']=$rating;
            }
        }

       // dd($aplist);

        $tobid = JobApply::where('job_post_id', $id)->distinct('freelancer_id')->count();
        $cfile = ClinetFile::where('post_idc', $id)->get();

        return view('project.projectdetails')->withPost($jobpost)->withJobap($aplist)->withBid($tobid)->withCfile($cfile)->withNew($news)->withClientinfo($clientd)->withClientlan($clietlan)->withTotalp($totalpost)->withSpent($spent);
    }

    public function getProjectdetailsclient($id)
    {
        $project = JobPost::with('projectcat','ratetype','joblevel','clienfile','jobapply')->find($id);
        return view('project.client-project-details', compact('project'));
    }


    public function getProjectedit(Request $request, $id)
    {
        $c_id_post = Auth::user()->id;
        
        $jobpost = JobPost::find($id);
        $cfile = ClinetFile::where('post_idc', $id)->get();


        $projetcat = ProjectCategory::all();
        $projectca = array();

        foreach ($projetcat as $projec) {
            $projectca[$projec->id] = $projec->project_cat;
        }


        $levels = JobLevel::all();
        $level = array();

        foreach ($levels as $lev) {
            $level[$lev->id] = $lev->job_level;
        }

        $rates = ProjectType::all();
        $rate = array();

        foreach ($rates as $ra) {
            $rate[$ra->id] = $ra->project_type;
        }

        $clientile = ClinetFile::where('post_idc', $id)->where('user_idc', $c_id_post)->get();

        return view('project.project-edit')->withPost($jobpost)->withcfile($cfile)->withProjectcat($projectca)->withLevel($level)->withRate($rate)->withCfile($clientile);
    }


    public function postProjectupdate(Request $request, $id)
    {
        //dd($request->all());

        $skill = $request->input('p_jobskill');
        //dd($skill);
        $files = Input::file('p_file');
        $file = $request->hasFile('p_file');

        if($file)
        {
            $jobpost = JobPost::find($id);
            
            $jobpost->user_id  = Auth::user()->id;
            $jobpost->p_title = $request->p_title;
            $jobpost->p_category_id = $request->p_category_id;
            $jobpost->p_description = $request->p_description;
            $jobpost->p_joblevel_id = $request->p_joblevel_id;
            $jobpost->p_jobskill = implode(',', (array)$skill);
            //dd($jobpost);(array)
            $jobpost->p_sdate = $request->p_sdate;
            $jobpost->p_edate = $request->p_edate;
            $jobpost->p_less = $request->p_less;
            $jobpost->p_ratetype_id = $request->p_ratetype_id;
            $jobpost->p_buddget = $request->p_buddget;

            if($jobpost->save()){

                //$cfile = ClinetFile::find($id);
                $cfile = ClinetFile::where('post_idc', $id)->get();
                $image = array();
                foreach ($cfile as $key => $val) {
                    $image[$val->post_idc] = $val->c_file;
                }
                dd($image);
                if ($file != null) {
                        foreach ($files as $file) {
                        $filename = rand(10,100) . time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = 'app_images/resize_images/';
                        $file->move($destinationPath, $filename);  

                        $oldFilename = array($image);
                        $cfile->c_file = $filename;
                        Storage::delete($oldFilename);                
                    }

                     // foreach ($cfile as $val) {
                     //        $oldFilename = array($val);
                     //        $val->c_file = $filename;
                     //        Storage::delete($oldFilename);
                     //       // $val->save();
                     //    }
                  
                }
                $cfile->save();
            }

        } 
        return redirect()->route('client')->with('success', 'Job has been successfully updated !');
    }

    

    public function getJobapplicantlist($id)
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $jobpost = JobPost::find($id);

        $appjob = JobApply::where('job_post_id', $id)->get();

        if(sizeof($appjob)>0){
            foreach ($appjob as $key => $value) {
              // $jobapplylist = JobApply::join('users', 'users.id', '=', 'job_applies.freelancer_id')
              // ->where('job_applies.job_post_id', $id)
              // ->get();
              $jobapplylist = JobApply::join('client_freelancers', 'client_freelancers.user_idu', '=', 'job_applies.freelancer_id')
                  ->where('job_applies.job_post_id', $id)
                  ->get();
            }
        }

        $tobid = JobApply::where('job_post_id', $id)->distinct('freelancer_id')->count();

        $checkapply = JobApply::where('job_post_id', $id)->first();
        
        if($checkapply != null ){
            return view('project.job-applicant-list')->withPost($jobpost)->withAplist($jobapplylist)->withBid($tobid)->withNew($news);
        }else{
            return redirect()->route('client')->with('warning', 'This job have not applied any Freelancher');
        }
        
    }

    public function getProjectsearch(Request $request)
    {
        $category = $request->category;
        $keyword = $request->discription;
        $type = $request->type;
        $budget = $request->budget;
        $skill = $request->skill;

        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        if($request->ajax()){
            $output = '';

            if($category != '' && $keyword == '' && $type == '' && $budget == 0 && $skill == ''){
                $search = JobPost::where('p_category_id', $category)->get();
               // dd($search);
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->get();
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_ratetype_id', $type)->get();
            }elseif ($category == '' && $keyword == '' && $type == '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category == '' && $keyword == '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->get();
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->get();
            }elseif ($category != '' && $keyword == '' && $type == '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword == '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->get();
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }
                elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }
                elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget == 0 && $skill != '') {
               $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword == '' && $type == '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->get();
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [0, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [101, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [201, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [301, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [401, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [701, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1001, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }else{
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->whereBetween('p_buddget', [1501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }else{
                    $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget != 0 && $skill == '') {
                if($budget <= 100){
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [0, $budget])->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [101, $budget])->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [201, $budget])->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [301, $budget])->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [401, $budget])->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [501, $budget])->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [701, $budget])->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1001, $budget])->get();
                }else{
                    $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->whereBetween('p_buddget', [1501, $budget])->get();
                }
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword == '' && $type == '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::whereBetween('p_buddget', [0, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::whereBetween('p_buddget', [101, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::whereBetween('p_buddget', [201, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::whereBetween('p_buddget', [301, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::whereBetween('p_buddget', [401, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::whereBetween('p_buddget', [501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::whereBetween('p_buddget', [701, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::whereBetween('p_buddget', [1001, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }else{
                    $search = JobPost::whereBetween('p_buddget', [1501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget != 0 && $skill != '') {
                if($budget <= 100){
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [0, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 200) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [101, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 300) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [201, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 400) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [301, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [401, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 700) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1000) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [701, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }elseif ($budget <= 1500) {
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1001, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }else{
                    $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->whereBetween('p_buddget', [1501, $budget])->where('p_jobskill', 'like', '%' . $skill . '%')->get();
                }
            }else{
                $search = JobPost::orderBy('id', 'desc')->paginate(5);
            }

            if(sizeof($search)>0){
                
                        foreach($search as $pro){
                           
                        $second = Carbon::parse($pro->created_at)->diffInSeconds($news);
                        $dt = Carbon::now('Asia/Dhaka');
                        $days = $dt->diffInDays($dt->copy()->addSeconds($second));
                        $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
                        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));

                            $output .='<div class="porject-list-full-area single-porject-area mix overflow-fix">
                        <div class="row padding-o">
                            <div class="col-lg-10">
                                <div class="single-porject-single-item overflow-fix">
                                    <div class="single-porject-heading overflow-fix">
                                        <h2>' . $pro->p_title . '</h2>
                                    </div>
                                    <div class="single-porject-type overflow-fix">
                                    <?php 
                                    ?>
                                        <h6>' . $pro->ratetype->project_type . ' - ' . $pro->joblevel->job_level . '-' . 'Level ($$) - Est. Time:' .  $pro->p_less . '-' . '<span>Posted' .' '. CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() . ' ' . 'ago<span></h6>
                                    </div>
                                    <div class="single-porject-datalist overflow-fix">
                                         ' . str_limit(strip_tags($pro->p_description), 300) . '' . '...<a href="'. url('project-details', $pro->id) . '">Read More</a>
                                    </div>
                                    <div class="single-porject-skill overflow-fix">
                                        <p>Skills:</p>
                                        <ul>
                                            <li><i>' . $pro->p_jobskill . ',</i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center">
                                <div class="see-dtiles-button overflow-fix">
                                    <a href="' . url('project-details', $pro->id) . ' " class="grren-btn">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                        }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }

    public function hireComplete($id)
    {
        dd($id);
    }

    public function projectDecline($id)
    {
        $apply = JobApply::where('job_post_id', $id)->get();
        $decline = JobPost::where('id', $id)->update(['status' => 6]);
        foreach ($apply as $value) {
            $value->jobapplyfree->notify(new ApplyNotify($decline, $value->freelancer_id, 2));
        }
        return redirect()->route('client')->with('success', 'This project have declined by client');
    }
}
