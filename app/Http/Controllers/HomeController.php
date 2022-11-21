<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows the home page dependant on user role, if any.
     * 
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.projects.index';
        } else {
            $home = 'user.projects.index';
        }
        return redirect()->route($home);
    }
}
