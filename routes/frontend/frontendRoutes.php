<?php

use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\GetProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentsController;
use App\Http\Controllers\Frontend\ProductsByTagController;
use App\Http\Controllers\Frontend\ProductsByVendorController;
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

    Route::get('debugging-front', function () {

        return view('debugging-front');
    });

    /** ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::controller(FrontController::class)->group(function () {

        //home page
        Route::get('/', 'index')->name('home');

        //about us page
        Route::get('about-us', 'aboutUs')->name('about');

        //contact us page
        Route::get('contact-us', 'contactUs')->name('contact');

        //cart page
        Route::get('show-cart', 'cartPage')->name('cart');
    });

    //*Auth Routes
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::controller(UserProfile::class)->group(function () {
            //user profile
            Route::get('profile', 'show')->name('user.profile');

            //compare products page (feature to be added in future)
            //Route::get('products-compare', 'productsCompare')->name('products.compare');

            //Wishlist products page
            Route::get('products-wishlist', 'wishList')->name('products.wishList');
        });

        //for payments
        Route::controller(PaymentsController::class)->group(function () {
            //checkout page
            Route::get('products-checkout', 'checkoutPage')->name('checkout');

            //place an order
            Route::any('place-order', 'placeOrder')->name('place.order');

            Route::any('order/invoice/{invoice}', 'userOrderInvoice')->name('invoice');
        });
    });

    //single Product Route
    Route::get('show-product/{slug}', [GetProductController::class, 'show'])->name('show.product');

    Route::controller(HomeController::class)->group(function () {
        //follow the name()
        Route::name('byCat.')->group(function () {
            Route::get('by-main-category/{slug}', 'productsByMainCategory')->name('main');
            Route::get('by-subcategory/{slug}', 'productsBySubCategory')->name('subCat');
            Route::get('by-sub-subcategory/{slug}', 'productsBySubSubCategory')->name('subSubcat');
        });

        //product shop
        Route::get('products/shop', 'productsShop')->name('shop');
    });


    //products by tags
    Route::get('by-Tag/{id}', [ProductsByTagController::class, 'getProducts'])->name('byTag');

    //products by vendors
    Route::get('by-vendor/{slug}', [ProductsByVendorController::class, 'getProducts'])->name('byVendor');
});
