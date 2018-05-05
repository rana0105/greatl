<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;
use Charts;
use App\Model\JobPost;
use App\Model\ProjectCategory;
use App\Model\JobLevel;
use App\Model\ProjectType;
use App\Model\JobApply;
use App\Model\ClinetFile;
use App\Model\ClientFreelancer;
use App\Model\Language;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
      $info = ClientFreelancer::orderBy('experience', 'desc')->where('role_idu', '=', 3)->limit(5)->get();
      $freelancers = [$info[3],$info[1],$info[0],$info[2],$info[4]];
      return view('index', compact('freelancers'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    public function clientProfile()
    {
      $current = Carbon::now('Asia/Dhaka');
      $tString = $current->toTimeString();
      $new     = Carbon::parse($tString);

      $clientpost = JobPost::where('user_id', Auth::user()->id)
                    ->with('jobapply')
                    ->get();

      return view('client.client-profile',compact('clientpost','new'));
    }

    public function clientProfileFilter($status)
    {
      $current = Carbon::now('Asia/Dhaka');
      $tString = $current->toTimeString();
      $new     = Carbon::parse($tString);

      $clientpost = JobPost::where('user_id', Auth::user()->id)
                      ->where('status', config('project.status.'.$status))
                      ->with('jobapply')
                      ->get();

      return view('client.client-profile',compact('clientpost','new','status'));
    }

    public function freelancerProfile()
    {
      $current = Carbon::now('Asia/Dhaka');
      $new = $current->toTimeString();
      $news=Carbon::parse($new);

      $id = Auth::user()->id;
      $clientpost = JobPost::where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
      $rate = ProjectType::all();
      $count = JobPost::all()->count();
      $procat = ProjectCategory::all();

      return view('freelance.login_freelancer_home_page')->withJobpost($clientpost)->withRate($rate)->withCount($count)->withNew($news)->withProcat($procat);
    }

    
    public function getSearch(Request $request)
    {

        $sid = $request->searchID;
        $skey = $request->searchkey;
        if($request->ajax()){
          $output ='';
        if($sid == 'project'){
                $projects = JobPost::where('p_title','like', '%' . $skey . '%')
                ->orwhere('p_description', 'like', '%' . $skey . '%')
                ->orwhere('p_jobskill', 'like', '%' . $skey . '%')
                ->where('status', '=', 1)
                ->get();
                $rate = ProjectType::all();
                $pcount = JobPost::all()->count();


                if(sizeof($projects)>0){
                
                        foreach($projects as $pro){
                            $output .='<div class="porject-list-full-area single-porject-area mix overflow-fix">
                        <div class="row padding-o">
                            <div class="col-lg-10">
                                <div class="single-porject-single-item overflow-fix">
                                    <div class="single-porject-heading overflow-fix">
                                        <h2>' . $pro->p_title . '</h2>
                                    </div>
                                    <div class="single-porject-type overflow-fix">
                                        <h6>' . $pro->ratetype->project_type . ' - ' . $pro->joblevel->job_level . '-' . 'Level ($$) - Est. Time:' .  $pro->p_less . '-' . '<span>Posted 35 minutes ago<span></h6>
                                    </div>
                                    <div class="single-porject-datalist overflow-fix">
                                         ' . substr($pro->p_description, 0, 300) . '<a href="'. url('project-details', $pro->id) . '">....more</a>
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

            // return view('project.serachproject')->withProjects($projects)->withRate($rate)->withPcount($pcount);
            return Response($output);

          // return redirect()->route('projects');

            }else if($sid == 'freelancer' ){
                $freelancers = ClientFreelancer::where('role_idu', 3)->get();
                $fcount = ClientFreelancer::where('role_idu', 3)->count();
                $procat = ProjectCategory::all();
        
                return view('freelance.searchfreelancer')->withFreelancers($freelancers)->withFcount($fcount)->withProcat($procat);

              return redirect()->route('freelancers');
            }else{
              return 'No data found';
            }
          }
    }


    public function postAsearch1(Request $request)
    {
      //dd($request->all());

      $geo = $request->geolocation;
      $geoa = explode(',', $geo);
      $lat = $geoa[0];
      $long = $geoa[1];

      $current = Carbon::now('Asia/Dhaka');
      $new = $current->toTimeString();
      $news=Carbon::parse($new);
      $rate = ProjectType::all();
      $pcount = JobPost::all()->count();
      $procat = ProjectCategory::all();
      $fcount = ClientFreelancer::where('role_idu', '=', 3)->count();

      $setkey = $request->setvalue;
      $skeyword = $request->search_input;

      if($setkey == 'project'){
        if($skeyword != ''){
        $projects = JobPost::where('p_title','like', '%' . $skeyword . '%')
            ->orwhere('p_jobskill', 'like', '%' . $skeyword . '%')
            ->get();
       
        return view('project.serachproject')->withProjects($projects)->withRate($rate)->withPcount($pcount)->withNew($news)->withProcat($procat);
        }else{
          return view('noresult');
        }
          
      }elseif($setkey == 'freelancer'){
        if($skeyword != ''){
          $freelancers = ClientFreelancer::where('designation', 'like', '%' . $skeyword . '%')

          ->orwhere('city', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('experience', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('level', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('skill', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)->get();

          if(sizeof($freelancers)>0)
          {
            $array_m = array();
            foreach ($freelancers as $key => $loc) {
              $row['id'] = $loc->id;
              $row['user_idu'] = $loc->user_idu;
              $row['name'] = $loc->name;
              $row['city'] = $loc->city;
              $row['address'] = $loc->address;
              $row['postalcode'] = $loc->postalcode;
              $row['category'] = $loc->category;
              $row['designation'] = $loc->designation;
              $row['overview'] = $loc->overview;
              $row['skill'] = $loc->skill;
              $row['hourly_rate'] = $loc->hourly_rate;
              $row['experience'] = $loc->experience;
              $row['p_image'] = $loc->p_image;
              $loca = explode(',', $loc->location);
              $row['distance'] = Distance::getDistance($lat,$long,$loca[0],$loca[1]);
              array_push($array_m, $row);
            }
            $distance = $this->orderByForDistance($array_m, 'distance');

           return view('freelance.searchfreelancer')->withFreelancers($distance)->withFcount($fcount);
          }else{
            return view('noresult');
          }
        }else{
          return view('noresult');
        }
      }else{
        return view('noresult');
      }
    }


    public function postAsearchlog1(Request $request)
    {
      //dd($request->all());

      $geo = $request->geolocation;
      $geoa = explode(',', $geo);
      $lat = $geoa[0];
      $long = $geoa[1];

      $current = Carbon::now('Asia/Dhaka');
      $new = $current->toTimeString();
      $news=Carbon::parse($new);
      $rate = ProjectType::all();
      $pcount = JobPost::all()->count();
      $procat = ProjectCategory::all();
      $fcount = ClientFreelancer::where('role_idu', '=', 3)->count();

      $setkey = $request->setvalue;
      $skeyword = $request->search_input;

      if($setkey == 'project'){
        if($skeyword != ''){
        $projects = JobPost::where('p_title','like', '%' . $skeyword . '%')
            ->orwhere('p_jobskill', 'like', '%' . $skeyword . '%')
            ->get();
       
        return view('project.serachprojectlog')->withProjects($projects)->withRate($rate)->withPcount($pcount)->withNew($news)->withProcat($procat);
        }else{
          return view('noresultlog');
        }
          
      }elseif($setkey == 'freelancer'){
        if($skeyword != ''){
          $freelancers = ClientFreelancer::where('designation', 'like', '%' . $skeyword . '%')

          ->orwhere('city', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('experience', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('level', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('skill', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)->get();

          if(sizeof($freelancers)>0)
          {
            $array_m = array();
            foreach ($freelancers as $key => $loc) {
              $row['id'] = $loc->id;
              $row['user_idu'] = $loc->user_idu;
              $row['name'] = $loc->name;
              $row['city'] = $loc->city;
              $row['address'] = $loc->address;
              $row['postalcode'] = $loc->postalcode;
              $row['category'] = $loc->category;
              $row['designation'] = $loc->designation;
              $row['overview'] = $loc->overview;
              $row['skill'] = $loc->skill;
              $row['hourly_rate'] = $loc->hourly_rate;
              $row['experience'] = $loc->experience;
              $row['p_image'] = $loc->p_image;
              $loca = explode(',', $loc->location);
              $row['distance'] = Distance::getDistance($lat,$long,$loca[0],$loca[1]);
              array_push($array_m, $row);
            }
            $distance = $this->orderByForDistance($array_m, 'distance');

           return view('freelance.searchfreelancerlog')->withFreelancers($distance)->withFcount($fcount);
          }else{
            return view('noresultlog');
          }
        }else{
          return view('noresultlog');
        }
      }else{
        return view('noresultlog');
      }
    }


    public function postAsearch(Request $request)
    {

      $current = Carbon::now('Asia/Dhaka');
      $new = $current->toTimeString();
      $news=Carbon::parse($new);
      $rate = ProjectType::all();
      $pcount = JobPost::all()->count();
      $procat = ProjectCategory::all();
      $fcount = ClientFreelancer::where('role_idu', 3)->count();

      $setkey = $request->setvalue;
      $skeyword = $request->search_input;

      if($setkey == 'project'){
        if($skeyword != ''){
        $projects = JobPost::where('p_title','like', '%' . $skeyword . '%')
            ->orwhere('p_jobskill', 'like', '%' . $skeyword . '%')
            ->get();
       
        return view('project.serachproject')->withProjects($projects)->withRate($rate)->withPcount($pcount)->withNew($news)->withProcat($procat);
        }else{
          return view('noresult');
        }
          
      }elseif($setkey == 'freelancer'){
        if($skeyword != ''){
          $freelancers = ClientFreelancer::where('designation', 'like', '%' . $skeyword . '%')
          ->orwhere('name', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('city', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('skill', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)->get();

          if(sizeof($freelancers)>0){
              foreach ($freelancers as $key => $valuer) {

                 $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuer->user_idu)->average('ratingf');
                 $valuer['ratingf']=$rating;
              }
          }
          
           return view('freelance.searchfreelancer')->withFreelancers($freelancers)->withFcount($fcount);
        }else{
          return view('noresult');
        }
      }else{
        return view('noresult');
      }
    }
    
    
    public function postAsearchlog(Request $request)
    {

      $current = Carbon::now('Asia/Dhaka');
      $new = $current->toTimeString();
      $news=Carbon::parse($new);
      $rate = ProjectType::all();
      $pcount = JobPost::all()->count();
      $procat = ProjectCategory::all();
      $fcount = ClientFreelancer::where('role_idu', 3)->count();

      $setkey = $request->setvalue;
      $skeyword = $request->search_input;

      if($setkey == 'project'){
        if($skeyword != ''){
        $projects = JobPost::where('p_title','like', '%' . $skeyword . '%')
            ->orwhere('p_jobskill', 'like', '%' . $skeyword . '%')
            ->get();
       
        return view('project.serachprojectlog')->withProjects($projects)->withRate($rate)->withPcount($pcount)->withNew($news)->withProcat($procat);
        }else{
          return view('noresult');
        }
          
      }elseif($setkey == 'freelancer'){
        if($skeyword != ''){
          $freelancers = ClientFreelancer::where('designation', 'like', '%' . $skeyword . '%')
          ->orwhere('name', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('city', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)
          ->orwhere('skill', 'like', '%' . $skeyword . '%')
          ->where('role_idu', '=', 3)->get();


          if(sizeof($freelancers)>0){
              foreach ($freelancers as $key => $valuer) {

                 $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuer->user_idu)->average('ratingf');
                 $valuer['ratingf']=$rating;
              }
          }

          //dd($freelancers);
           return view('freelance.searchfreelancerlog')->withFreelancers($freelancers)->withFcount($fcount);
        }else{
          return view('noresultlog');
        }
      }else{
        return view('noresultlog');
      }
    }


     public function getRegister(){
        return view('auth.register');
    }

    public function getLogin(){
        return view('auth.login');
    }

    private function orderByForDistance($data, $field){
      $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
      usort($data, create_function('$a,$b', $code));
      return $data;
   }

}



class Distance{
            /**
             * Mean raidus of the earth in kilometers.
             * @var double
             */
            const RADIUS    = 6372.797;
        
            /**
             * Pi divided by 180 degrees. Calculated with PHP Pi constant.
             * @var double
             */
            const PI180         = 0.017453293;
        
            /**
             * Constant for converting kilometers into miles.
             * @var double
             */
            const MILES     = 0.621371192;
        
            /**
             * Calculate distance between two points of latitude and longitude.
             * @param double $lat1 The first point of latitude.
             * @param double $long1 The first point of longitude.
             * @param double $lat2 The second point of latitude.
             * @param double $long2 The second point of longitude.
             * @param bool $kilometers Set to false to return in miles.
             * @return double The distance in kilometers or miles, whichever selected.
             */
            public static function getDistance($lat1, $long1, $lat2, $long2, $kilometers = true)
            {
                $lat1   *= self::PI180;
                $long1  *= self::PI180;
                $lat2   *= self::PI180;
                $long2  *= self::PI180;
        
                $dlat = $lat2 - $lat1;
                $dlong = $long2 - $long1;
        
                $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlong / 2) * sin($dlong / 2);
                $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
                $km = self::RADIUS * $c;
        
                if($kilometers)
                {
                    return $km;
                }
                else
                {
                    return $km * self::MILES;
                }
            }
        }
