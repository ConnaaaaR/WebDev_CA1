<?php

namespace App\Http\Controllers\User;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{

    // --- PAGES ---//
    /**
     * Shows all created resources, sorted by recent.
     * 
     * @param  Project $project
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest('updated_at')->filter(request(['tag', 'search']))->simplePaginate(6);
        return view('user.projects.index')->with('projects', $projects);
    }


    /**
     * Shows a specific resource.
     * 
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function show(Project $project)
    {
        $user = User::find($project->user_id);
        // if ($project->user_id != Auth::id()) {
        //     return abort(403);
        // }
        return view('user.projects.show')->with('project', $project)->with('user', $user);
    }

    // --- PAGES END---//
}
