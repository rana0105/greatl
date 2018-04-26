<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProjectType;

class ProjectTypeController extends Controller
{
    
    public function index()
    {
        $project_types = ProjectType::all();

        return view('backend.rate_type.index')->withProjecttypes($project_types);
    }

    
    public function create()
    {
        return view('backend.rate_type.create');
    }

    
    public function store(Request $request)
    {
        $project_type = new ProjectType;

        $project_type->project_type = $request->project_type;

        $project_type->save();

        return redirect()->route('rate-type.index')->with('success', 'Project type has been saved !');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $project_type = ProjectType::find($id);

        return view('backend.rate_type.edit')->withProjecttype($project_type);
    }

    public function update(Request $request, $id)
    {
        $project_type = ProjectType::find($id);

        $project_type->project_type = $request->project_type;

        $project_type->save();

        return redirect()->route('rate-type.index')->with('success', 'Project type has been Updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
