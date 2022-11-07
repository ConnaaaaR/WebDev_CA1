<?php

use App\Http\Controllers\projectController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


// Controller Routes
Route::get('projects/user/{user}', [userController::class, 'show'])->name('projects.user');
Route::get('projects/logout', [userController::class, 'logout'])->name('projects.logout');
Route::get('/projects/userprojects', [projectController::class, 'userprojects'])->name('projects.userprojects');

Route::resource('/projects', projectController::class);


// Route::resource('/projects', userController::class);
// Route::resource('/projects', projectController::class)->middleware(['auth']);




// Default Routes

Route::get('/', function () {
    return redirect(route('projects.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
