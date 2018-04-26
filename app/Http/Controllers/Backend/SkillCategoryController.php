<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SkillCategory;

class SkillCategoryController extends Controller
{
    public function index()
    {
        $skill_categories = SkillCategory::all();

        return view('backend.skill_category.index')->withSkillcats($skill_categories);
    }

    
    public function create()
    {
        return view('backend.skill_category.create');
    }

    
    public function store(Request $request)
    {
        $skill_category = new SkillCategory;

        $skill_category->skill_category = $request->skill_category;

        $skill_category->save();

        return redirect()->route('skill-category.index')->with('success', 'Project type has been saved !');
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $skill_category = SkillCategory::find($id);

        return view('backend.skill_category.edit')->withSkillcat($skill_category);
    }

    public function update(Request $request, $id)
    {
        $skill_category = SkillCategory::find($id);

        $skill_category->skill_category = $request->skill_category;

        $skill_category->save();

        return redirect()->route('skill-category.index')->with('success', 'Project type has been Updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
