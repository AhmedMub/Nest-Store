<?php

namespace App\Listeners;

use App\Events\ZeroProductQuantity;
use App\Mail\ProductStatusDisabledMail;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DisableProductStatus
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ZeroProductQuantity $event)
    {
        //check
        $Product = Product::findOrFail($event->status);
        if ($Product->qty == 0) {
            $Product->product_status = 0;
            $Product->save();
        }
        //send email to admin if the qty become zero
        //Mail::to('a@a.com')->send(new ProductStatusDisabledMail());
    }
}
