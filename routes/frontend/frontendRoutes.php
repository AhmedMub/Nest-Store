<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\UserProfile;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Front end Routes
|--------------------------------------------------------------------------

|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    /** ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', [FrontController::class, 'index'])->name('home');
});

//Auth Routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //user profile
    Route::get('profile', [UserProfile::class, 'show'])->name('user.profile');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
