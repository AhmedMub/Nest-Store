<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Actions\Fortify\PasswordResetLinkController;
use App\Actions\Fortify\NewPasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;

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


//Admin Routes ONLY
Route::prefix('admin/')->middleware(['admin.auth:sanctum,admin', 'verified'])->group(function () {

    //for Admin. routes
    Route::name('admin.')->group(function () {

        //Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'show'])->name('dashboard');

        //admin profile
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    });

    //Categories
    Route::prefix('category')->group(function () {

        //All Categories
        Route::get('show/all', [CategoryController::class, 'show'])->name('all.cats');

        //All Categories
        Route::get('subcategory', [SubCategoryController::class, 'show'])->name('subcategory');
    });
});
