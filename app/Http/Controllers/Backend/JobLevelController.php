<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobLevel;

class JobLevelController extends Controller
{
    public function index()
    {
        $job_levels = JobLevel::all();

        return view('backend.job_level.index')->withJoblevels($job_levels);
    }

    
    public function create()
    {
        return view('backend.job_level.create');
    }

    
    public function store(Request $request)
    {
        $job_level = new JobLevel;

        $job_level->job_level = $request->job_level;

        $job_level->save();

        return redirect()->route('job-level.index')->with('success', 'Job level has been saved !');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $job_level = JobLevel::find($id);

        return view('backend.job_level.edit')->withJoblevel($job_level);
    }

    public function update(Request $request, $id)
    {
        $job_level = JobLevel::find($id);

        $job_level->job_level = $request->job_level;

        $job_level->save();

        return redirect()->route('job-level.index')->with('success', 'Job level has been Updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
