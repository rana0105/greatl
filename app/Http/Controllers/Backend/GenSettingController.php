<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GenSetting;
use Storage;
use Image;
use Intervention\Image\ImageManager;
use DB;

class GenSettingController extends Controller
{
    public function index()
    {
        $gsettings = GenSetting::all();

        $name = DB::table('gen_settings')->pluck('app_name');
        $logo = DB::table('gen_settings')->pluck('logo');
        $copy = DB::table('gen_settings')->pluck('copy');
        $year = DB::table('gen_settings')->pluck('year');
        return view('backend.gensetting.index')->withGsetting($gsettings)->withName($name)->withLogo($logo)->withCopy($copy)->withYear($year);
    }

    
    public function create()
    {
        $name = DB::table('gen_settings')->pluck('app_name');
        $logo = DB::table('gen_settings')->pluck('logo');
        $copy = DB::table('gen_settings')->pluck('copy');
        $year = DB::table('gen_settings')->pluck('year');

        return view('backend.gensetting.create')->withName($name)->withLogo($logo)->withCopy($copy)->withYear($year);
    }

    
    public function store(Request $request)
    {

        $images = $request->file('logo');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = 'app_images/resize_images/'. $filename;
        Image::make($images)->resize(600 , 600)->save($location);

        if($images)
        {
            $gensetting = new GenSetting;
            
            $gensetting->app_name = $request->app_name;
            $gensetting->copy = $request->copy;
            $gensetting->year = $request->year;
            $gensetting->logo = $filename;      
        }

        $gensetting->save();
        return redirect()->route('gsetting.index')->with('success' , 'Data have been save!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $gensetting = GenSetting::find($id);
        $name = DB::table('gen_settings')->pluck('app_name');
        $logo = DB::table('gen_settings')->pluck('logo');
        $copy = DB::table('gen_settings')->pluck('copy');
        $year = DB::table('gen_settings')->pluck('year');

        return view('backend.gensetting.edit')->withGenset($gensetting)->withName($name)->withLogo($logo)->withCopy($copy)->withYear($year);
    }

    
    public function update(Request $request, $id)
    {
        $images = $request->file('logo');
        $gensetting = GenSetting::find($id);
            
        if($images != null) {              
            $filename = time().'.'.$images->getClientOriginalExtension();
            $location = 'app_images/resize_images/'. $filename;
            Image::make($images)->resize(600 , 600)->save($location);

            $oldFilename = $gensetting->logo;
            $gensetting->logo = $filename;
            Storage::delete($oldFilename);

        } else {
            $gensetting->app_name = $request->app_name;
            $gensetting->copy = $request->copy;
            $gensetting->year = $request->year;

         }   

        $gensetting->app_name = $request->app_name;
        $gensetting->copy = $request->copy;
        $gensetting->year = $request->year;

        $gensetting->save();

        return redirect()->route('gsetting.index')->with(['success' => 'Data have been updated !']);
    }

    
    public function destroy($id)
    {
        $gensetting = GenSetting::find($id);
        $gensetting->copy = null;
        $gensetting->year = null;
        $gensetting->save();
        return redirect()->route('gsetting.index')->with(['success' => 'Data have been deleted !']);
    }
}
