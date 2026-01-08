<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminApplicationController;

use App\Http\Controllers\Admin\JobController as AdminJobController;
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [JobController::class, 'home'])->name('home');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/jobs/category/{id}', [JobController::class, 'jobsByCategory'])
    ->name('jobs.byCategory');




Route::middleware('auth')->group(function () {

    // التقديم على وظيفة
    Route::get('/apply/{job}', [ApplicationController::class, 'applicationForm'])->name('applications.form');
        

    Route::post('/apply', [ApplicationController::class, 'store'])->name('applications.store');
        

    // Dashboard user
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminJobController::class, 'dashboard'])->name('dashboard');


        // Jobs CRUD
        Route::resource('jobs', AdminJobController::class);

        // Applications
        Route::get('/jobs/{job}/applications', [AdminJobController::class, 'index'])
            ->name('jobs.applications');

        Route::get('/applications/{application}', [AdminJobController::class, 'show'])
            ->name('applications.show');

        Route::get('applications', [\App\Http\Controllers\Admin\AdminApplicationController::class, 'index'])
            ->name('applications.index');


});



require __DIR__.'/auth.php';
