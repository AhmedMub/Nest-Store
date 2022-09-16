<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use App\Actions\Fortify\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Actions\Fortify\AdminLogoutResponse;
use App\Http\Responses\LoginResponse;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * To return admin login view
     *
     */
    public function adminLogin(Request $request)
    {
        return view('admin.auth.login', ['request' => $request]);
    }

    /**
     * To return admin Dashboard
     *
     */
    public function show()
    {
        //total users
        $usersCount = User::count();

        //total revenue
        $totalProfits = Order::whereStatus(4)->sum('amount');

        //total orders;
        $totalOrders = Order::count();

        //total products
        $totalProducts = Product::count();

        //delivered orders
        $deliveredOrders = Order::whereStatus(4)->count();

        //canceled orders
        $canceledOrders = Order::whereStatus(5)->count();

        $getAllOrders = Order::all();

        $getShippedOrders = Order::whereStatus(3)->latest()->get();

        $getPendingOrders = Order::whereStatus(0)->latest()->get();

        $getCanceledOrders = Order::whereStatus(5)->latest()->get();

        return view('admin.pages.dashboard', compact(
            'usersCount',
            'totalProfits',
            'totalOrders',
            'totalProducts',
            'deliveredOrders',
            'canceledOrders',
            'getAllOrders',
            'getShippedOrders',
            'getPendingOrders',
            'getCanceledOrders',
        ));
    }


    /**
     * To return admin profile
     *
     */
    public function profile()
    {
        /*
            If there is only one admin in the table Delete portion should not be visible by the only admin that is exists
        */
        $allAdmins = Admin::count();

        $admin = Auth::user();
        return view('admin.pages.profile', compact(['admin', 'allAdmins']));
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy(Request $request): AdminLogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(AdminLogoutResponse::class);
    }
}
