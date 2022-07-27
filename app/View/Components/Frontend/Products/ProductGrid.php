<?php

namespace App\View\Components\Frontend\Products;

use Illuminate\View\Component;

class ProductGrid extends Component
{
    public $headerName;
    public $product;
    public $user;
    public $langAr;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headerName, $product, $user, $langAr)
    {
        $this->headerName = $headerName;
        $this->product = $product;
        $this->user = $user;
        $this->langAr = $langAr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.products.product-grid');
    }
}
