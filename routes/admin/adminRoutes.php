<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\Admin\Profile;
use Illuminate\Support\Facades\Route;

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
