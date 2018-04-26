<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $project_cate = ProjectCategory::all();

        return view('backend.project_cat.index')->withProjectcats($project_cate);
    }

    
    public function create()
    {
        return view('backend.project_cat.create');
    }

    
    public function store(Request $request)
    {
        $project_cat = new ProjectCategory;

        $project_cat->project_cat = $request->project_cat;

        $project_cat->save();

        return redirect()->route('project-category.index')->with('success', 'Project category has been saved !');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $project_cat = ProjectCategory::find($id);

        return view('backend.project_cat.edit')->withProjectcat($project_cat);
    }

    public function update(Request $request, $id)
    {
        $project_cat = ProjectCategory::find($id);

        $project_cat->project_cat = $request->project_cat;

        $project_cat->save();

        return redirect()->route('project-category.index')->with('success', 'Project category has been Updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
