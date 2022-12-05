<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        $user = Auth::user();
        /* eslint-disable */
        $user->authorizeRoles('admin');
        /* eslint-enable */
        $projects = Project::latest('updated_at')->filter(request(['tag', 'search']))->simplePaginate(6);
        return view('admin.projects.index')->with('projects', $projects);
    }

    /**
     * Return all resources created by a user
     * 
     * @return \Iluminate\Http\Response
     */
    public function userprojects()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $projects = Project::where('user_id', Auth::id())->paginate(6);

        return view('admin.projects.userprojects')->with('projects', $projects);
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

        if ($user->hasRole('companyLead')) {
            return view('companyLead.projects.show')->with('project', $project)->with('user', $user);
        }
        return view('admin.projects.show')->with('project', $project)->with('user', $user);
    }

    // --- PAGES END---//



    //--- CREATE ---//
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Iluminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->hasRole('companyLead') && !$user->hasRole('admin')) {
            return to_route('companyLead.projects.create');
        }

        $user->authorizeRoles('admin');
        return view('admin.projects.create');
    }

    /**
     * Stores a new resource.
     * 
     * @param  Request $request
     * @return \Iluminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        if (!$request->hasFile('image')) {
            return to_route('admin.project.create')->with('message', 'No file uploaded');
        }
        $request->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:200',
            'tags' => 'required|max:20',
            'image' => 'required'
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
        return to_route('admin.projects.index')->with('message', "Project Uploaded Successfully");
    }

    //--- CREATE END ---//


    //---  EDIT --- //

    /**
     * Deletes a specific resource
     * 
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $project->delete();
        return to_route('admin.projects.index');
    }

    /**
     * Show form for edtied a previously created resource.
     * 
     * @param  Project $project
     * @return \Iluminate\Http\Response
     */
    public function edit(Project $project)
    {
        $user = Auth::user();
        if ($user->hasRole('companyLead') && !$user->hasRole('admin')) {
            return to_route('companyLead.projects.edit');
        }
        $user->authorizeRoles('admin');
        return view('admin.projects.edit')->with('project', $project);
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
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $request->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:200',
            'tags' => 'required|max:20',
            'image' => 'required'
        ]);

        // dd($project);
        $img = $request->file('image');
        $fn = now()->timezone('Europe/Dublin')->format('Ymd_His') . $img->getClientOriginalName();
        $img->move('img/', $fn);

        $project->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $fn
        ]);
        return to_route('admin.projects.show', $project)->with('success', 'Successfully edited project');
    }


    //---  EDIT END --- //









}
