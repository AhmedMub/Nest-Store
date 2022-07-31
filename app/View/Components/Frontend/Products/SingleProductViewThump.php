<?php

namespace App\View\Components\Frontend\Products;

use Illuminate\View\Component;

class SingleProductViewThump extends Component
{
    public $product;
    public $langAr;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $langAr)
    {
        $this->product = $product;
        $this->langAr = $langAr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.products.single-product-view-thump');
    }
}
