<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\ClientFreelancer;
use App\Model\JobApply;
use App\Model\JobPost;
use App\Model\Language;
use App\Model\ProjectCategory;
use App\Model\ServiceFee;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use Intervention\Image\ImageManager;
use Storage;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    private function user()
    {
        return Auth::user();
    }

     public function getClientprofileupdate()
    {
        $uprofile = User::find($this->user()->id);
        $category = ProjectCategory::all();
        $profile = ClientFreelancer::where('user_idu', $this->user()->id)->first();
        $lang = Language::where('user_idl', $this->user()->id)->get();
       // dd($lang);

        if(sizeof($profile)>0){
            return view('client.client-profile-setting')->withUprofile($uprofile)->withPro($category)
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
            $location = '/home3/bamrmm/public_html/public/app_images/resize_images/'. $filename;
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
            $user = User::find($this->user()->id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
        }
        return redirect()->route('client.profile.show')->with('successpd', 'Profile details updated !');
       
    }


    public function postContactupdate(Request $request)
    {
        $this->validate($request, [
        ]);
        $id = $this->user()->id;
        $contact = ClientFreelancer::where('user_idu', $id)->first();

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

        return redirect()->route('client.profile.show')->with('successpi', 'Contact information updated !');
       
    }


    public function postPasswordupdate(Request $request)
    {
        // dd($request->all());
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
        return redirect()->route('client.profile.show')->with('successp', 'User password have been changed successfully !');
    }


    public function postLanguageupdate(Request $request)
    {
        $this->validate($request, [
        ]);
        $id = $this->user()->id;
        if($request != null){
            $language = new Language;
            $language->user_idl = $id;
            $language->language = $request->language;
            $language->proficiency = $request->proficiency;
            $language->save();

        }elseif($id){
            $userl = Language::where('user_idl', $id)->first();

            if($userl == null){
                $language = new Language;
                $language->user_idl = $id;
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

        return redirect()->route('client.profile.show')->with('successl', 'Language have been added successfully !');

    }
}
