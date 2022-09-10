<?php

namespace App\View\Components\Frontend\Products;

use Illuminate\View\Component;

class SingleProductView extends Component
{
    public $product;
    public $user;
    public $langAr;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $user, $langAr)
    {
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
        return view('components.frontend.products.single-product-view');
    }
}
