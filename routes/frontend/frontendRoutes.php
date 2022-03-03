<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\UserProfile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Front end Routes
|--------------------------------------------------------------------------

|
*/

Route::get('/', [FrontController::class, 'index'])->name('home');

//Auth Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //user profile
    Route::get('profile', [UserProfile::class, 'show'])->name('user.profile');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
