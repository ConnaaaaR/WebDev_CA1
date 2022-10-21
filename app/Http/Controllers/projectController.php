<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $img->move('images/', now()->timezone('Europe/Dublin')->format('Ymd_His') . $img->getClientOriginalName());

        Project::create([

            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text,
            'image' => $img

        ]);


        return to_route('projects.index');
    }

    public function show($id)
    {
        //
    }
}
