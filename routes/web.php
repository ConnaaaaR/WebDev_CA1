<?php

use App\Http\Controllers\user\projectController as UserProjectController;
use App\Http\Controllers\admin\projectController as AdminProjectController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


// Controller Routes
Route::get('admin/projects/user/{user}', [userController::class, 'show'])->name('admin.projects.user');
Route::get('admin/projects/logout', [userController::class, 'logout'])->name('admin.projects.logout');
Route::get('admin/projects/userprojects', [AdminProjectController::class, 'userprojects'])->name('admin.projects.userprojects');

// Route::resource('/projects', projectController::class);

//default 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// Route::resource('/projects', userController::class);
// Route::resource('/projects', projectController::class)->middleware(['auth']);
//admin routes
Route::resource('admin/projects', AdminProjectController::class)->middleware(['auth'])->names('admin.projects');

//user route
Route::resource('user/projects', UserProjectController::class)->names('user.projects');



// Default Routes

Route::get('/', function () {
    return redirect(route('home.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
