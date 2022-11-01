<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{


    // Main page, displays all projects
    public function index()
    {

        $projects = Project::latest('updated_at')->paginate(6);

        return view('projects.index')->with('projects', $projects);
    }

    // Create Page, shows a form to create new entry
    public function create()
    {
        return view('projects.create');
    }






    public function edit(Project $project){

        // dd($project);
        if($project->user_id != Auth::id()){
            return abort(403);
        }

        return view('projects.edit')->with('project', $project);
    }

    public function update(Project $project, Request $request){
        // dd($project);
        $img = $request->file('image');
        $fn = now()->timezone('Europe/Dublin')->format('Ymd_His') . $img->getClientOriginalName();
        $img->move('img/', $fn);

        $project->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $fn
        ]);
        return to_route('projects.show', $project)->with('success', 'Successfully edited project');  
    }







    // Stores Function, sends post request
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([

            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        $img = $request->file('image');
        $fn = now()->timezone('Europe/Dublin')->format('Ymd_His') . $img->getClientOriginalName();
        $img->move('img/', $fn);


        Project::create([

            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text,
            'image' => $fn

        ]);


        return to_route('projects.index')->with('message', "Project Uploaded Successfully");
    }
   
    public function userprojects()
    {
        $projects = Project::where('user_id', Auth::id())->paginate(6);
     
        // dd($projects);

        // if ($projects->user_id != Auth::id()) {
        //     return abort(403);
        // }


        return view('projects.userprojects')->with('projects', $projects);
    }

    public function show(Project $project)
    {

        $user = User::find($project->user_id);
        if ($project->user_id != Auth::id()) {
            return abort(403);
        }
        return view('projects.show')->with('project', $project)->with('user', $user);
    }

    public function destroy(Project $project)
    {
       if($project->user_id != Auth::id()){
           return abort(403);
       }

       $project->delete();
       return to_route('projects.index');
    }


}
