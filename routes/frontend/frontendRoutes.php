<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\GetProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsByTagController;
use App\Http\Controllers\Frontend\ProductsByVendorController;
use App\Http\Controllers\Frontend\UserProfile;
use App\Http\Livewire\Frontend\Prodcut\ProductsByCategory;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Front end Routes
|--------------------------------------------------------------------------

|
*/
//TODO add route for the shop view

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('debugging-front', function () {

        return view('debugging-front');
    });

    /** ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', [FrontController::class, 'index'])->name('home');

    //contact us page
    Route::get('contact-us', [FrontController::class, 'contactUs'])->name('contact');

    //Auth Routes
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        //user profile
        Route::get('profile', [UserProfile::class, 'show'])->name('user.profile');
    });

    //*Product Route
    Route::get('show-product/{slug}', [GetProductController::class, 'show'])->name('show.product');

    //products by category
    // Route::name('byCat.')->group(function () {
    //     Route::get('by-main-category/{slug}', [HomeController::class, 'byMainCategory'])->name('main');
    //     Route::get('by-subcategory/{slug}', [HomeController::class, 'bySubcategory'])->name('subCat');
    //     Route::get('by-sub-subcategory/{slug}', [HomeController::class, 'bySubSubcategory'])->name('subSubcat');
    // });

    Route::name('byCat.')->group(function () {
        Route::get('by-main-category/{slug}', [HomeController::class, 'productsByMainCategory'])->name('main');
        Route::get('by-subcategory/{slug}', [HomeController::class, 'bySubcategory'])->name('subCat');
        Route::get('by-sub-subcategory/{slug}', [HomeController::class, 'bySubSubcategory'])->name('subSubcat');
    });

    //products by tags
    Route::get('by-Tag/{id}', [ProductsByTagController::class, 'getProducts'])->name('byTag');

    //products by tags
    Route::get('by-vendor/{slug}', [ProductsByVendorController::class, 'getProducts'])->name('byVendor');
});





// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
