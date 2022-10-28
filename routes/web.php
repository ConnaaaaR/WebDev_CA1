<?php

use App\Http\Controllers\projectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ProjectController Routes
Route::get('/projects/userprojects', [projectController::class, 'userprojects'])->name('projects.userprojects');
Route::resource('/projects', projectController::class);
Route::resource('/projects', projectController::class)->middleware(['auth']);




// Default Routes

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
