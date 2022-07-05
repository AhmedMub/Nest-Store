<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\PasswordResetLinkController;
use App\Actions\Fortify\NewPasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubcategoryController;
use App\Http\Controllers\Admin\Testing;
use App\Http\Controllers\Admin\VendorController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
//TODO: must add forget-password functionality for Admin

Route::get('testing', [Testing::class, 'testing']);

Route::get('testing2', function () {

    return view('testing2');
});
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
    Route::prefix('category/')->group(function () {

        //All Categories
        Route::get('show/all', [CategoryController::class, 'show'])->name('all.cats');

        //All SubCategories
        Route::get('subcategory', [SubCategoryController::class, 'show'])->name('subcategory');

        //All SubSubCategories
        Route::get('sub-subcategory', [SubSubcategoryController::class, 'show'])->name('sub.subcategory');
    });

    //Vendors
    Route::prefix('vendors/')->group(function () {

        //vendor namespace, to use create::class method for many routes
        $vendor = 'App\Http\Livewire\Admin\Vendor\\';

        Route::get('edit/vendors', [VendorController::class, 'show'])->name('manage.vendors');

        //Add new Vendor
        Route::get('add/new-vendor', $vendor . Create::class)->name('add.vendor');
    });

    //Products
    Route::prefix('product/')->name('product.')->group(function () {

        $product = 'App\Http\Livewire\Admin\Product\\';

        Route::get('edit/products', [ProductController::class, 'show'])->name('manage');

        //Add new product
        Route::get('add/new-product', $product . Create::class)->name('add');

        //product controls
        Route::get('controls', $product . Controls::class)->name('ctrl');

        //product tags
        Route::get('manage-tags', [ProductController::class, 'productTags'])->name('tags');

        //product discounts
        Route::get('manage-discounts', [ProductController::class, 'productDiscounts'])->name('discount');
    });
});
