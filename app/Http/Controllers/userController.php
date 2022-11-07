<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Destroy authenticated session
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return to_route('projects.index');
    }

    /**
     * Show specific user model
     * 
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function show(User $user)
    {
        return view('projects.user')->with('user', $user);
    }
}
