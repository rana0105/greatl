<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\ClientFreelancer;
use App\Model\FreePayment;
use App\Model\FreeRating;
use App\Model\FreeWithdraw;
use App\Model\JobApply;
use App\Model\JobPost;
use App\Model\Language;
use App\Model\ProjectCategory;
use App\Model\ServiceFee;
use App\User;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use Illuminate\Http\Request;
use Image;
use Intervention\Image\ImageManager;
use Storage;


class FreelancerController extends Controller
{

    
    public function profileView(User $freelancer)
    {
        $freelencerProfile = $freelancer->load('freelencer','freelancerRating');
         return view('freelance.free-single-profile', compact('freelencerProfile'));
    }

    public function getFreelancerview()
    {
        
        $freelancers = ClientFreelancer::where('role_idu', 3)->paginate(5);

        if(sizeof($freelancers)>0){
            foreach ($freelancers as $key => $valuer) {

               $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuer->user_idu)->average('ratingf');
               $valuer['ratingf']=$rating;
            }
        }

        //dd($freelancers);

        $fcount = ClientFreelancer::where('role_idu', 3)->count();

        $procat = ProjectCategory::all();

        $zipcode = ClientFreelancer::where('role_idu', '=', 3)->pluck('postalcode');
        //dd($zipcode);
            
        return view('freelance.freelancerview')->withFreelancers($freelancers)->withFcount($fcount)->withProcat($procat)->withZipcode($zipcode);
    }


    public function getFreelancerviewlog()
    {
        
        $freelancers = ClientFreelancer::where('role_idu', 3)->paginate(5);

        if(sizeof($freelancers)>0){
            foreach ($freelancers as $key => $valuer) {

               $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuer->user_idu)->average('ratingf');
               $valuer['ratingf']=$rating;
            }
        }

        //dd($freelancers);

        $fcount = ClientFreelancer::where('role_idu', 3)->count();

        $procat = ProjectCategory::all();

        $zipcode = ClientFreelancer::where('role_idu', '=', 3)->pluck('postalcode');
        //dd($zipcode);
            
        return view('freelance.freelancerviewlog')->withFreelancers($freelancers)->withFcount($fcount)->withProcat($procat)->withZipcode($zipcode);
    }


    public function getCategory(Request $request)
    {
        $cid = $request->catID;
        //dd($cid);
        if($request->ajax()){
            $output = '';
            if($cid == 0){
                $getcat = ClientFreelancer::orderBy('category', 'desc')->where('role_idu', 3)->paginate(5);
            }else{
                $getcat = ClientFreelancer::where('category', $cid)->where('role_idu', 3)->paginate(5);
            }

            if(sizeof($getcat)>0){
                foreach ($getcat as $key => $valuers) {

                   $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuers->user_idu)->average('ratingf');
                   $valuers['ratingf']=$rating;
                }
            }
            if(sizeof($getcat)){

                foreach ($getcat as $cat) {
                    $output .='
                    <div class="single-profile-item box-white-bg overflow-fix">
                    <div class="row padding-o">
                        <div class="col-lg-2">  
                            <div class="single-profile-item-img overflow-fix">
                                <a href=""><img src="'. asset('app_images/resize_images') . '/' . $cat->p_image . '"/></a>
                            </div>
                        </div>
                        <div class="col-lg-8">  
                            <div class="single-profile-single-item overflow-fix">
                                <div class="single-profile-heading overflow-fix d-flex justify-content-start">
                                    <a href="' . url('freelancer-profile', $cat->user_idu) . '"><h2>' . $cat->name . '</h2></a>
                                    <ul>
                                        <li><a href="">' . $cat->hourly_rate . '$/hr</a></li>
                                        <li><a href="">' . $cat->experience . '</a></li>
                                        <li>
                                            <div class="profile-simple-rating d-flex">'; 
                                                 for($star=1; $star<=5; $star++){
                                                        if($cat->ratingf >= $star){ 
                                                      $output .='<i class="fa fa-star" aria-hidden="true"></i>';  
                                                        }else{ 
                                                      $output .='<i class="fa fa-star-o" aria-hidden="true"></i>';  
                                                        } 
                                                    }  
                                            $output .='</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-subject overflow-fix">
                                    <h6>' . $cat->designation . '</h6>
                                </div>
                                <div class="single-profile-datalist overflow-fix">
                                ' . str_limit(strip_tags($cat->overview), 300) .
                                     (strlen(strip_tags($cat->overview)) > 300)
                                      . '... <a href="' . url('freelancer-profile', $cat->user_idu) . '" class="">Read More</a>
                                    
                                </div>
                                <div class="single-profile-skill overflow-fix">
                                    <p>Skills:</p>
                                    <ul>
                                        <li><i>' . $cat->skill . ',</i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center">
                            <div class="see-dtiles-button overflow-fix">
                                <a href="' . url('freelancer-profile', $cat->user_idu) . '" class="grren-btn">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>';
                $output .='<div class="pagination-area overflow-fix">
                    <div class="pagi">
                        ' . $getcat->links() . '  
                    </div>
                </div>';
                }
            }else{
                $output .='No data found !';
            }
            return Response($output);
        }
    }

    public function getSchange(Request $request)
    {
        $state = $request->state;
        $zipcode = DB::table("client_freelancers")->where('role_idu', '=', 3)->where("city",$state)->pluck("postalcode");

        return json_encode($zipcode);
    }


    public function getfreeSearch(Request $request)
    {
        $category = $request->category;
        $state = $request->state;
        $zipcode = $request->zipcode;
        $range = $request->range;
        $skill = $request->skill;

        if($request->ajax()){
            $output = '';
            // if($category == 0){
            //     $search = ClientFreelancer::orderBy('category', 'desc')->where('role_idu', '=', 3)->paginate(5);
            // }else
            if($category != '' && $state == '' && $zipcode == '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('category', $category)->where('role_idu', '=', 3)->get();
            }elseif($category == '' && $state != '' && $zipcode == '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('city', $state)->where('role_idu', '=', 3)->get();
            }elseif($category == '' && $state == '' && $zipcode != '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('postalcode', $zipcode)->where('role_idu', '=', 3)->get();
            }elseif($category == '' && $state == '' && $zipcode == '' && $range != 0 && $skill == ''){
              if($range <= 5){
                    $search = ClientFreelancer::whereBetween('hourly_rate', [0, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [6, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [11, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [16, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [26, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [46, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [66, $range])->where('role_idu', '=', 3)->get();
                }else{
                    $search = ClientFreelancer::whereBetween('hourly_rate', [81, $range])->where('role_idu', '=', 3)->get();
                }
            }elseif($category == '' && $state == '' && $zipcode == '' && $range == 0 && $skill != ''){
                $search = ClientFreelancer::where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state != '' && $zipcode == '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state == '' && $zipcode != '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('category', $category)->where('postalcode', $zipcode)->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state == '' && $zipcode == '' && $range != 0 && $skill == ''){
                if($range <= 5){
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [0, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [6, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [11, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [16, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [26, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [46, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [66, $range])->where('role_idu', '=', 3)->get();
                }else{
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [81, $range])->where('role_idu', '=', 3)->get();
                }
            }elseif($category != '' && $state == '' && $zipcode == '' && $range == 0 && $skill != ''){
                $search = ClientFreelancer::where('category', $category)->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state != '' && $zipcode != '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state != '' && $zipcode == '' && $range != 0 && $skill == ''){
                if($range <= 5){
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [0, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [6, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [11, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [16, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [26, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [46, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [66, $range])->where('role_idu', '=', 3)->get();
                }else{
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->whereBetween('hourly_rate', [81, $range])->where('role_idu', '=', 3)->get();
                }
            }elseif($category != '' && $state != '' && $zipcode == '' && $range = 0 && $skill != ''){
                $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
            }elseif($category != '' && $state == '' && $zipcode == '' && $range != 0 && $skill != ''){
                if($range <= 5){
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [0, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [6, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [11, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [16, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [26, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [46, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [66, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }else{
                    $search = ClientFreelancer::where('category', $category)->whereBetween('hourly_rate', [81, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }
            }elseif($category != '' && $state != '' && $zipcode != '' && $range != 0 && $skill == ''){
                if($range <= 5){
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [0, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [6, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [11, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [16, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [26, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [46, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [66, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10000){
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [81, $range])->where('role_idu', '=', 3)->get();
                }else{
                  $output .='No data found !';
                }
            }elseif($category != '' && $state != '' && $zipcode != '' && $range == 0 && $skill != ''){
                $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
            }elseif($category == '' && $state != '' && $zipcode != '' && $range == 0 && $skill == ''){
                $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->where('role_idu', '=', 3)->get();
            }elseif ($category == '' && $state != '' && $zipcode != '' && $range != 0 && $skill == '') {
                if($range <= 5){
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [0, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [6, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [11, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [16, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [26, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [46, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [66, $range])->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10000){
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [81, $range])->where('role_idu', '=', 3)->get();
                }else{
                  $output .="Data not found";
                }
            }elseif ($category == '' && $state != '' && $zipcode != '' && $range == 0 && $skill != '') {
                $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
            }elseif ($category == '' && $state != '' && $zipcode != '' && $range != 0 && $skill != '') {
                if($range <= 5){
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [0, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [6, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [11, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [16, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [26, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [46, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [66, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10000){
                    $search = ClientFreelancer::where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [81, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }else{
                  $output .="Data not found";
                }
            }elseif ($category == '' && $state == '' && $zipcode == '' && $range != 0 && $skill != '') {
                if($range <= 5){
                    $search = ClientFreelancer::whereBetween('hourly_rate', [0, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [6, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [11, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [16, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [26, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [46, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::whereBetween('hourly_rate', [66, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10000){
                    $search = ClientFreelancer::whereBetween('hourly_rate', [81, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }else{
                  $output .="Data not found";
                }
            }elseif ($category != '' && $state != '' && $zipcode != '' && $range != 0 && $skill != '') {
                if($range <= 5){
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [0, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [6, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 15) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [11, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 25) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [16, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 45) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [26, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 65) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [46, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 80) {
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [66, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }elseif ($range <= 10000){
                    $search = ClientFreelancer::where('category', $category)->where('city', $state)->where('postalcode', $zipcode)->whereBetween('hourly_rate', [81, $range])->where('skill', 'like', '%' . $skill . '%')->where('role_idu', '=', 3)->get();
                }else{
                  $output .="Data not found";
                }
            }else{
                $search = ClientFreelancer::orderBy('id', 'desc')->where('role_idu', '=', 3)->paginate(5);
            }

            if(sizeof($search)>0){
                foreach ($search as $key => $valuerf) {

                   $rating = DB::table('free_ratings')->where('freelancer_idrf', $valuerf->user_id)->average('ratingf');
                   $valuerf['ratingf']=$rating;
                }
            }

            if(sizeof($search)>0){

                foreach ($search as $sea) {
                    $output .='
                    <div class="row padding-o">
                        <div class="col-lg-2">  
                            <div class="single-profile-item-img overflow-fix">
                                <a href=""><img src="'. asset('app_images/resize_images') . '/' . $sea->p_image . '"/></a>
                            </div>
                        </div>
                        <div class="col-lg-8">  
                            <div class="single-profile-single-item overflow-fix">
                                <div class="single-profile-heading overflow-fix d-flex justify-content-start">
                                    <a href="' . url('freelancer-profile', $sea->user_id) . '"><h2>' . $sea->name . '</h2></a>
                                    <ul>
                                        <li><a href="">' . $sea->hourly_rate . '$/hr</a></li>
                                        <li><a href="">' . $sea->experience . '</a></li>
                                        <li>
                                            <div class="profile-simple-rating d-flex">'; 
                                                 for($star=1; $star<=5; $star++){
                                                        if($sea->ratingf >= $star){ 
                                                      $output .='<i class="fa fa-star" aria-hidden="true"></i>';  
                                                        }else{ 
                                                      $output .='<i class="fa fa-star-o" aria-hidden="true"></i>';  
                                                        } 
                                                    }  
                                            $output .='</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-profile-subject overflow-fix">
                                    <h6>' . $sea->designation . '</h6>
                                </div>
                                <div class="single-profile-datalist overflow-fix">
                                ' . str_limit(strip_tags($sea->overview), 300) .
                                     (strlen(strip_tags($sea->overview)) > 300)
                                      . '... <a href="' . url('freelancer-profile', $sea->user_id) . '" class="">Read More</a>
                                    
                                </div>
                                <div class="single-profile-skill overflow-fix">
                                    <p>Skills:</p>
                                    <ul>
                                        <li><i>' . $sea->skill . ',</i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center">
                            <div class="see-dtiles-button overflow-fix">
                                <a href="' . url('freelancer-profile', $sea->user_id) . '" class="grren-btn">View Profile</a>
                            </div>
                        </div>
                </div>';
                }
            }else{
                $output .='No data found !';
            }
            return Response($output);
        }
    }

    public function getFreelancerprofilesi(Request $request)
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $freeid = $request->freeid;

        $freeprofile = ClientFreelancer::where('user_idu', $freeid)->where('role_idu', '=', 3)->first();

        $catesi = $freeprofile->category;
        $skillsi = $freeprofile->skill;

        $similerjob = JobPost::where('p_category_id', $catesi)
                      ->orwhere('p_jobskill', 'like', '%' . $skillsi . '%')
                      ->limit(5)->get();

        if($request->ajax()){

            $output = '';

            if(sizeof($similerjob)>0){
                
                        foreach($similerjob as $pro){
                           
                        $second = Carbon::parse($pro->created_at)->diffInSeconds($news);
                        $dt = Carbon::now('Asia/Dhaka');
                        $days = $dt->diffInDays($dt->copy()->addSeconds($second));
                        $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
                        $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));

                        $output .='
                        <div class="project-details-similar-single-area post  box-white-bg padding-to overflow-fix">
                            <h2><a href="'. url('project-details', $pro->id) . '">' . $pro->p_title . '</a></h2>
                            <h6 class="new-proj-sound overflow-fix">
                                '. CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() . ' ' . '
                            </h6>
                            <ul>
                                <li>$' . $pro->p_buddget . ' Spent</li>
                                <li>' . $pro->ratetype->project_type . '</li>
                            </ul>
                        </div>';
                    }
            }else{
                $output .='No data found';
            }
            return Response($output);
        }
    }


    public function getClientprofile($id)
    {
        $freeprofile = ClientFreelancer::where('user_idu', $id)->where('role_idu', '=', 2)->first();
        $jobcount = JobPost::where('user_id', $id)->count();

        $spent = JobPost::where('user_id', $id)->sum('p_buddget');

        $freelang = Language::where('user_idl', $id)->get(); 

        $rating = DB::table('client_ratings')->where('user_idr', $id)->average('rating');

        return view('client.client-single-profile')->withSprofile($freeprofile)->withLang($freelang)->withRating($rating)->withJobcount($jobcount)->withSpent($spent);
    }

    private function user()
    {
        return Auth::user();
    }

    public function getFreelancerprofileupdate()
    {
        $uprofile = User::find($this->user()->id);
        $category = ProjectCategory::all();
        $profile = ClientFreelancer::where('user_idu', $this->user()->id)->first();
        $lang = Language::where('user_idl', $this->user()->id)->get();

        if(sizeof($profile)>0){
            return view('freelance.freelancer-profile-setting')->withUprofile($uprofile)->withPro($category)
                ->withProfile($profile)
                ->withLan($lang);
        }else{
        }

    }

    public function postProfileupdate(Request $request)
    {
        $this->validate($request, [
            'name' => '',
            'username' => 'required|string|max:255|unique:client_freelancers,username,' . $this->user()->id,
            'email' => 'required|string|email|max:255|unique:client_freelancers,email,' . $this->user()->id,
            'username' => 'required|string|max:255|unique:users,username,' . $this->user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'p_image' => '',
        ]);
        $images = $request->file('p_image');
        $profile = ClientFreelancer::where('user_idu', $this->user()->id)->first();            
        if($images != null) {              
            $filename = time().'.'.$images->getClientOriginalExtension();
            $location = 'app_images/resize_images/'. $filename;
            Image::make($images)->resize(600 , 600)->save($location);

            $oldFilename = $profile->p_image;
            $profile->p_image = $filename;
            Storage::delete($oldFilename);

        } else {
            $profile->name = $request->name;
            $profile->username = $request->username;
            $profile->email = $request->email;

         }
        $profile->name = $request->name;
        $profile->username = $request->username;
        $profile->email = $request->email;

        if($profile->save()){
            $user = $this->user();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->route('freelancer.profile.show')->with('successpd', 'Profile details updated !');
       
    }

    public function postContactupdate(Request $request)
    {
        $this->validate($request, [
        ]);

        $contact = ClientFreelancer::where('user_idu', $this->user()->id)->first();

        $country = $request->country;
        $city = $request->city;
        $address = $request->address;

        $location = $address.' '.$city.' '.$country;
        
       $addresses = urlencode($location);
      
       $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$addresses."&sensor=true";

       $xml = simplexml_load_file($request_url) or die("url not loading");
       $status = $xml->status;
          if ($status=="OK") {
              $Lat = $xml->result->geometry->location->lat;
              $Lon = $xml->result->geometry->location->lng;
              $LatLng = "$Lat,$Lon";
          }

        $contact->timezone = $request->timezone;
        $contact->country = $country;
        $contact->city = $city;
        $contact->address = $address;
        $contact->postalcode = $request->postal_code;
        $contact->phone = $request->phone;
        $contact->location = $LatLng;

        $contact->save();

        return redirect()->route('freelancer.profile.show')->with('successpi', 'Contact information updated !');
       
    }

    public function postSettingupdate(Request $request)
    {
        $this->validate($request, [
        ]);

        $setting = ClientFreelancer::where('user_idu', $this->user()->id)->first();
        $setting->level = $request->level;
        $setting->category = $request->category;

        $setting->save();

        return redirect()->route('freelancer.profile.show')->with('successps', 'Profile setting updated !');
       
    }

    public function postMyprofileupdate(Request $request)
    {

        $this->validate($request, [
        ]);

        $skill = $request->input('skill');

        $mypro = ClientFreelancer::where('user_idu', $this->user()->id)->first();

        $mypro->designation = $request->designation;
        $mypro->skill = implode(',', $skill);
        $mypro->overview = $request->overview;
        $mypro->hourly_rate = $request->hrate;
        $mypro->experience = $request->experience;
        $mypro->availability = $request->availability;

        $mypro->save();

        return redirect()->route('freelancer.profile.show')->with('successm', 'My Profile updated !');
    }

    public function postPasswordupdate(Request $request)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);


        $data = $request->old_password;
 
        $user = $this->user();
        if(!\Hash::check($data, $user->password)){
             return back()
                        ->with('error','The specified password does not match the database password');
        }else{
           $user->password = bcrypt($request->new_password);

           $user->save();
        }
        return redirect()->route('freelancer.profile.show')->with('successp', 'User password have been changed successfully !');
    }

    public function postMembershipupdate(Request $request)
    {

        $this->validate($request, [
        ]);
        dd($request->all());

       
    }

    public function postLanguageupdate(Request $request)
    {
        $this->validate($request, [
        ]);

        if($request != null){
            $language = new Language;
            $language->user_idl = $this->user()->id;
            $language->language = $request->language;
            $language->proficiency = $request->proficiency;
            $language->save();

        }elseif($this->user()->id){
            $userl = Language::where('user_idl', $this->user()->id)->first();

            if($userl == null){
                $language = new Language;
                $language->user_idl = $this->user()->id;
                $language->language = $request->language;
                $language->proficiency = $request->proficiency;
                $language->save();

            }else{
                $language->language = $request->language;
                $language->proficiency = $request->proficiency;
                $language->save();
            }

        }else{
            return 'not add';
        }

        return redirect()->route('freelancer.profile.show')->with('successl', 'Language have been added successfully !');

    }

    public function postLanguagedelete(Request $request, $id)
    {
        //dd($request->all());
        $language = Language::where('user_idl', $request->upid)->find($id);
        $language->delete();

        return redirect()->route('freelancer.profile.show')->with('errord', 'Language have been deleted successfully !');

    }


    public function getJobrate(Request $request)
    {
        $current = Carbon::now('Asia/Dhaka');
        $new = $current->toTimeString();
        $news=Carbon::parse($new);

        $rateid = $request->ratype;
        if($request->ajax()){
            $output = '';
            if($rateid == 0){
                $jobpost = JobPost::orderBy('id', 'desc')->paginate(5);
            }else{
                $jobpost = JobPost::where('p_ratetype_id', $rateid)->get();
            }
            //dd($jobpost);
            if(sizeof($jobpost)){
                foreach ($jobpost as $post) {

                    $second = Carbon::parse($post->created_at)->diffInSeconds($news);
                    $dt = Carbon::now('Asia/Dhaka');
                    $days = $dt->diffInDays($dt->copy()->addSeconds($second));
                    $hours = $dt->diffInHours($dt->copy()->addSeconds($second)->subDays($days));
                    $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($second)->subHours($hours)->subDays($days));

                    $output .='<div class="single-porject-area mix fixed-buget-1 overflow-fix">
                        <div class="row padding-o">
                            <div class="col-lg-10">
                                <div class="single-porject-single-item overflow-fix">
                                    <div class="single-porject-heading overflow-fix">
                                        <h2>' . $post->p_title . '</h2>
                                    </div>
                                    <div class="single-porject-type overflow-fix">
                                        <h6>' . $post->ratetype->project_type . ' - ' . $post->joblevel->job_level . ' Level ($$) - Est. Time: ' . $post->p_less . ' -  <span>Posted' .' '. CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans() . ' ' . 'ago<span></h6>
                                    </div>
                                    <div class="single-porject-datalist overflow-fix">
                                         ' . str_limit(strip_tags($post->p_description), 300) . '' . '...<a href="' . url('job-applicant-list', $post->id) . ' ">Read More</a> 
                                    </div>
                                    
                                    <div class="single-porject-skill overflow-fix">
                                        <p>Skills:</p>
                                        <ul>
                                            <li><i>' . $post->p_jobskill . ',</i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center">
                                <div class="see-dtiles-button overflow-fix">
                                    <a href="' . url('project-details', $post->id) . ' " class="grren-btn">See Details</a>
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


    public function getApplyjob($id)
    {
        $jobpost = JobPost::find($id);

        $fee = ServiceFee::first();

        if($jobpost->p_ratetype_id == 1 ){
            return view('freelance.apply-job-fixed')->withPost($jobpost)->withFee($fee);
        }else{
            return view('freelance.apply-job-hourly')->withPost($jobpost)->withFee($fee);
        }
        
    }

    public function getProposalproject(Request $request, $id)
    {
        $applyjob = JobApply::where('freelancer_id', $id)->distinct('freelancer_id')->get();
        if(sizeof($applyjob)>0){
            foreach ($applyjob as $key => $value) {
               $totalpost= JobApply::where('job_post_id', $value->job_post_id)->distinct('freelancer_id')->count();
               $value['bid']=$totalpost;
            }
        }
        if(sizeof($applyjob)>0){
            foreach ($applyjob as $key => $val) {
               $avg= JobApply::where('job_post_id', $val->job_post_id)->distinct('freelancer_id')->avg('bidamount');
               $val['avg']=$avg;
            }
        }
        return view('freelance.proposal-project')->withApply($applyjob);
    }

    public function getFreetranshistory()
    {

          return view('freelance.freelancer-transaction-history');
    }
    
    public function getFreeweektime()
    {

          return view('freelance.freelancer-weekly-timesheet');
    }

    public function getBalanceoverview()
    {

        return view('freelance.balance-overview');
    }

    
    public function getBalancewithdraw()
    {
        $jobApply = JobApply::where('freelancer_id', Auth::user()->id)->get();
        $freeWithdraw = FreeWithdraw::where('user_id', Auth::user()->id)->sum('withdraw_amount');
        $withdrawPayment = FreePayment::where('freelancer_id', Auth::user()->id)->get();
        $pendingBalance = FreeWithdraw::where('user_id', Auth::user()->id)->where('status', 0)->get();
        return view('freelance.balance-withdraw',  compact('withdrawPayment', 'freeWithdraw', 'pendingBalance'));
    }

    public function postBalancewithdraw(Request $request)
    {
        $this->validate($request, [
            'withdraw_amount' => 'required'
        ]);
        if($this->checkWithdrawBalance($request->withdraw_amount)){
            $withdraw = new FreeWithdraw;
            $withdraw->user_id          = Auth::user()->id;
            $withdraw->withdraw_amount  = $this->checkWithdrawBalance($request->withdraw_amount);
            //dd($withdraw);
            $withdraw->save();
            return redirect()->route('balance.withdraw')->with('success' , 'This request successfully for withdraw payment');
        }
        return redirect()->route('balance.withdraw')->with('warning' , 'This request balance have not sufficient for withdraw payment');
    }

    private function checkWithdrawBalance($checkBalance)
    {

        $withdrawPay = FreePayment::where('freelancer_id', Auth::user()->id)->sum('freelancer_payment');
        $freeWithdraw = FreeWithdraw::where('user_id', Auth::user()->id)->sum('withdraw_amount');
        $withdrawPayment = $withdrawPay - $freeWithdraw;
        return $withdrawPayment >= $checkBalance ? $checkBalance : false;
    }

    public function getPaymentmethod()
    {

          return view('freelance.payment-method');
    }

    public function getProjectsearchf(Request $request)
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
                $search = JobPost::where('p_buddget', $budget)->get();
            }elseif ($category == '' && $keyword == '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->get();
            }elseif ($category != '' && $keyword == '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_ratetype_id', $type)->get();
            }elseif ($category != '' && $keyword == '' && $type == '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_buddget', $budget)->get();
            }elseif ($category != '' && $keyword == '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->get();
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_buddget', $budget)->get();
            }elseif ($category != '' && $keyword != '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_buddget', $budget)->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget == 0 && $skill == '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->get();
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_buddget', $budget)->get();
            }elseif ($category == '' && $keyword != '' && $type == '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_buddget', $budget)->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword != '' && $type != '' && $budget != 0 && $skill != '') {
                $search = JobPost::where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_buddget', $budget)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget != 0 && $skill == '') {
                $search = JobPost::where('p_ratetype_id', $type)->where('p_buddget', $budget)->get();
            }elseif ($category == '' && $keyword == '' && $type != '' && $budget == 0 && $skill != '') {
                $search = JobPost::where('p_ratetype_id', $type)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category == '' && $keyword == '' && $type == '' && $budget != 0 && $skill != '') {
                $search = JobPost::where('p_buddget', $budget)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
            }elseif ($category != '' && $keyword != '' && $type != '' && $budget != 0 && $skill != '') {
                 $search = JobPost::where('p_category_id', $category)->where('p_title', 'like', '%' . $keyword . '%')->where('p_ratetype_id', $type)->where('p_buddget', $budget)->where('p_jobskill', 'like', '%' . $skill . '%')->get();
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

}
