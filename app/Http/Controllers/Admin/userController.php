<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return to_route('home.index');
    }

    /**
     * Shows all created users
     * 
     * @param  User $users
     * @return \Iluminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $users = User::all();
        // dd($users);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show specific user model
     * 
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function show(User $user)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        return view('admin.users.show')->with('user', $user);
    }


    /**
     * Displays edit view for specific user
     * 
     * @param Company $company
     * @return \Iluminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        $companys = Company::all();

        $user->authorizeRoles('admin');
        return view('admin.users.edit')->with('user', $user)->with('companys', $companys);
    }

    /**
     * Updates a company in the database
     * 
     * @param Company $company
     * @param Request $request
     * @return \Iluminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company_id' => ['required', 'int'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id
        ]);

        return to_route('admin.users.show', $user)->with('success', 'Successfully edited user');
    }




    /**
     * Drops user from database
     * 
     * @param Company $company
     * @return \Iluminate\Http\Response
     */
    public function destroy(User $user)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        $user->delete();
        return to_route('admin.users.index');
    }
}
