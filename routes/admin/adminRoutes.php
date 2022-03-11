<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Actions\Fortify\PasswordResetLinkController;
use App\Actions\Fortify\NewPasswordController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
//TODO: must add forget-password functionality for Admin

// Public Routes
Route::post('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::prefix('admin/')->middleware('admin:admin')->name('admin.')->group(function () {

    Route::get('login', [AdminController::class, 'adminLogin'])->name('login');

    Route::post('login', [AdminController::class, 'store'])->name('store');

    // Password Reset...
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware(['guest:' . config('fortify.guard')])
        ->name('password.request');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware(['guest:' . config('fortify.guard')])
        ->name('password.reset');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware(['guest:' . config('fortify.guard')])
        ->name('password.email');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->middleware(['guest:' . config('fortify.guard')])
        ->name('password.update');
});



// Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {

//     return view('admin.pages.dashboard');
// })->name('admin.dashboard');

//Admin Routes ONLY
Route::prefix('admin/')->middleware(['auth:sanctum,admin', 'verified'])->name('admin.')->group(function () {

    Route::get('dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');


    //admin profile
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
});
