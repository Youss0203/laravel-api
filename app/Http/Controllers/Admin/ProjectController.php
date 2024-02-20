<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;


class ProjectController extends Controller
{
    
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project','types','technologies'));
    }


    public function store(Request $request)
    {
        $newProject = Project::create($request->all());
        return redirect()->route('admin.projects.show', $newProject);
    }



    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }



    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }




    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('admin.projects.show', $project);
    }


    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function deletedIndex(){
        $projects = Project::onlyTrashed()->get();
        
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function deletedShow(string $id){

        $project = Project::withTrashed()->where('id', $id)->first();
        
        return view('admin.projects.deleted-show', compact('project'));
    }

    public function deletedRestore(string $id){
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->restore();
    }

    public function deletedDestroy(string $id){

        $project = Project::withTrashed()->where('id', $id)->first();

       
        $project->forceDelete () ;
        return redirect () ->route ('admin.projects.deleted.index') ;    

    }

}