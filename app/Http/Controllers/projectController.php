<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    /**
     * Shows all created resources, sorted by recent.
     * 
     * @param  Project $project
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest('updated_at')->paginate(6);
        return view('projects.index')->with('projects', $projects);
    }


    /**
     * Show the form for creating a new resource.
     * 
     * @return \Iluminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }


    /**
     * Show form for edtied a previously created resource.
     * 
     * @param  Project $project
     * @return \Iluminate\Http\Response
     */
    public function edit(Project $project)
    {
        if ($project->user_id != Auth::id()) {
            return abort(403);
        }
        return view('projects.edit')->with('project', $project);
    }


    /**
     * Store changes to a previously created resource.
     * 
     * @param \Iluminate\Http\Request $request
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function update(Project $project, Request $request)
    {
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


    /**
     * Stores a new resource.
     * 
     * @param  Request $request
     * @return \Iluminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'tags' => $request->tags,
            'text' => $request->text,
            'image' => $fn
        ]);
        return to_route('projects.index')->with('message', "Project Uploaded Successfully");
    }


    /**
     * User projects dashboard
     * 
     * @return \Iluminate\Http\Response
     */
    public function userprojects()
    {
        $projects = Project::where('user_id', Auth::id())->paginate(6);
        return view('projects.userprojects')->with('projects', $projects);
    }


    /**
     * Shows a specific resource.
     * @param int $id
     * 
     * @return \Iluminate\Http\Response
     */
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
        if ($project->user_id != Auth::id()) {
            return abort(403);
        }

        $project->delete();
        return to_route('projects.index');
    }
}
