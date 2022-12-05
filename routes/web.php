<?php

use App\Http\Controllers\user\projectController as UserProjectController;
use App\Http\Controllers\admin\projectController as AdminProjectController;
use App\Http\Controllers\admin\companysController;
use App\Http\Controllers\companyLead\projectController as LeadProjectController;
use App\Http\Controllers\companysController as ControllersCompanysController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


// Additional Routes
Route::get('admin/projects/user/{user}', [userController::class, 'show'])->name('admin.projects.user');
Route::get('admin/projects/logout', [userController::class, 'logout'])->name('admin.projects.logout');
Route::get('companyLead/projects/userprojects', [LeadProjectController::class, 'userprojects'])->name('companyLead.projects.userprojects');
Route::get('admin/projects/userprojects', [AdminProjectController::class, 'userprojects'])->name('admin.projects.userprojects');

//default 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// --- --- ---
//admin routes
Route::resource('admin/company', CompanysController::class)->middleware(['auth'])->names('admin.company');

Route::resource('admin/projects', AdminProjectController::class)->middleware(['auth'])->names('admin.projects');




// --- --- ---


// --- --- ---
//company lead routes
Route::resource('companyLead/projects', LeadProjectController::class)->middleware(['auth'])->names('companyLead.projects');



Route::get('companyLead/projects/user/{user}', [userController::class, 'show'])->name('companyLead.projects.user');
// --- --- ---


// --- --- ---
//user routes
Route::resource('user/projects', UserProjectController::class)->names('user.projects');
// --- --- ---


// Default Routes
Route::get('/', function () {
    return redirect(route('home.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
