<?php

namespace App\Console\Commands;


use App\Mail\SendEmailNoProductsExp;
use App\Mail\SendEmailWithProductsExp;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckProductsExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:productsexp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check products expiration dates';

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
        $products = Product::whereProductStatus(1)->get();
        $checkProductsArr = [];
        if (count($products) > 0) {
            foreach ($products as $product) {
                if (Carbon::parse($product->productDates->exp)->isPast()) {
                    $checkProductsArr[] = $product->sku;
                    $product->update([
                        'product_status' => 0,
                    ]);
                }
            }
        }
        //if the checkProductsArr empty will send and email to admin that everything is fine
        if (count($checkProductsArr) == 0) {
            //TODO must get admin email from db after ruels and permission
            Mail::to('a@a.com')->send(new SendEmailNoProductsExp());
        } else {
            Mail::to('a@a.com')->send(new SendEmailWithProductsExp($checkProductsArr));
        }
    }
}
