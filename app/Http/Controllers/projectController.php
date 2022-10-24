<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User as UserM;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    // Main page, displays all projects
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->latest('updated_at')->paginate(6);
        return view('projects.index')->with('projects', $projects);
    }

    // Create Page, shows a form to create new entry
    public function create()
    {
        return view('projects.create');
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


        return to_route('projects.index');
    }

    public function show(Project $project)
    {

        $user = User::find($project->user_id);
        if ($project->user_id != Auth::id()) {
            return abort(403);
        }
        return view('projects.show')->with('project', $project)->with('user', $user);
    }
}
