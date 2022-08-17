<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountWishlist extends Component
{
    //wishlist number for user
    public $count;

    protected $listeners = ['newWishlistItem' => '$refresh'];

    public function render()
    {
        if (Auth::check()) {
            $this->count = Auth::user()->addToWishes()->whereProductStatus(1)->count();
        }
        return view('livewire.frontend.product.count-wishlist');
    }
}
