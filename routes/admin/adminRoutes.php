<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\PasswordResetLinkController;
use App\Actions\Fortify\NewPasswordController;
use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontSiteController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubcategoryController;
use App\Http\Controllers\Admin\Testing;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ManageOrdersController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ShippingController;
//TODO remove unused classes
use App\Mail\SendEmailNoProductsExp;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductExpiration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/


//if user try reset password with route get method
Route::get('/admin/reset-password', function () {
    return view('errors.admin404');
});

// Public Routes
Route::any('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');


Route::middleware(['admin:admin'])->prefix('admin/')->name('admin.')->group(function () {

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
Route::middleware(['auth:sanctum,admin', 'verified', 'auth:admin'])->prefix('admin/')->group(function () {

    //for Admin. routes
    Route::name('admin.')->group(function () {

        //Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'show'])->name('dashboard');

        //admin profile
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    });

    //routes for super and administrators only
    Route::middleware(['role:super-admin|administrator'])->group(function () {
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

        //Front Website Components
        Route::prefix('components/')->group(function () {
            //Slider
            Route::get('edit-slider', [FrontSiteController::class, 'editSlider'])->name('slider');
        });

        //Adding Coupon Discounts
        Route::prefix('coupons/')->group(function () {
            //coupons
            Route::get('manage-coupons', [CouponController::class, 'manageCoupons'])->name('coupon');
        });

        //Adding shipping country
        Route::controller(ShippingController::class)->name('shipping.')->group(function () {
            //country
            Route::get('manage-shipping/country', 'countryShipping')->name('country');

            //district
            Route::get('manage-shipping/district', 'districtShipping')->name('district');
        });

        //orders
        Route::controller(ManageOrdersController::class)->prefix('manage-orders/')->name('orders.')->group(function () {
            // confirmed
            // processing
            // shipped orders
            // delivered orders
            // canceled orders
            //cancel requests
            Route::get('pending', 'pendingOrders')->name('pending');
            Route::get('confirmed', 'confirmedOrders')->name('confirmed');
            Route::get('processing', 'processingOrders')->name('processing');
            Route::get('shipped', 'shippedOrders')->name('shipped');
            Route::get('delivered', 'deliveredOrders')->name('delivered');
            Route::get('canceled', 'canceledOrders')->name('canceled');
            Route::get('cancel/requests', 'canceledOrdersRequests')->name('canceled.requests');
            Route::any('order/invoice/{invoice}', 'showInvoice')->name('show.invoice');
        });

        //notifications
        Route::controller(NotificationsController::class)->prefix('manage-notifications/')->name('notification.')->group(function () {
            //show all list
            Route::any('show/all', 'notificationsList')->name('show.all');
        });
    });


    //Products
    Route::prefix('product/')->name('product.')->group(function () {
        //products for all admins
        //for All
        Route::middleware(['role:super-admin|administrator|author'])->group(function () {

            $product = 'App\Http\Livewire\Admin\Product\\';

            Route::get('edit/products', [ProductController::class, 'show'])->name('manage');

            //Add new product
            Route::get('add/new-product', $product . Create::class)->name('add');

            //product controls
            Route::get('controls', $product . Controls::class)->name('ctrl');

            //Product Expiration dates
            Route::get('days-remaining', $product . ExpiryDates::class)->name('expire');
        });

        //for supers and administrators only
        Route::middleware(['role:super-admin|administrator'])->group(function () {
            //product tags
            Route::get('manage-tags', [ProductController::class, 'productTags'])->name('tags');

            //product discounts
            Route::get('manage-discounts', [ProductController::class, 'productDiscounts'])->name('discount');
        });
    });

    //admin roles
    Route::middleware(['role:super-admin'])->controller(AdminRolesController::class)->prefix('manage-roles/')->name('role.')->group(function () {
        //show all list
        Route::get('register/new-admin', 'adminRegistration')->name('new.admin');

        Route::get('show/admins', 'show')->name('show.admins');
    });
});
