<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CouponExpired extends Mailable
{
    use Queueable, SerializesModels;

    protected $coupons = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($coupons)
    {
        $this->coupons = $coupons;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin.couponExp')->with([
            'coupons' => $this->coupons,
        ]);
    }
}
