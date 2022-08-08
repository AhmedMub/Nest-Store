<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class UserWishlistComponent extends Component
{
    public $user;
    public $products;
    public $langAr;

    public function mount($user, $products, $langAr)
    {
        $this->user = $user;
        $this->products = $products;
        $this->langAr = $langAr;
    }

    public function render()
    {
        return view('livewire.frontend.product.user-wishlist-component');
    }
}
