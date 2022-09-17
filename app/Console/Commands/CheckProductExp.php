<?php

namespace App\Console\Commands;

use App\Mail\CouponExpired;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckProductExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:couponexp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check coupon expiration date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $coupons = Coupon::whereStatus(1)->get();
        $checkCouponsArr = [];
        if (count($coupons) > 0) {
            foreach ($coupons as $coupon) {
                if (Carbon::parse($coupon->valid_to)->isPast()) {
                    $checkCouponsArr[] = $coupon->name;
                    $coupon->update([
                        'status' => 0,
                    ]);
                }
            }
        }
        if (count($checkCouponsArr) > 0) {
            //TODO must get admin email from db after ruels and permission
            Mail::to('a@a.com')->send(new CouponExpired($checkCouponsArr));
        }
    }
}
