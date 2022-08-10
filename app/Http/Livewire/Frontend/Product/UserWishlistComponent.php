<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UserWishlistComponent extends Component
{
    public $user;
    public $products;
    public $langAr;
    public $count;

    public function mount($user, $langAr)
    {
        $this->user = $user;
        $this->langAr = $langAr;
    }

    public function removeFromWishlist($productId)
    {

        //TODO must add this validation all livewire get methods
        //this is to validate incoming requests data to prevent any other time of data injections
        $validate = [
            'productId' => $productId,
        ];
        Validator::make(
            $validate,
            [
                'productId' => 'numeric|digits_between:1,7',
            ]
        )->validate();

        //check if user does not have such product
        if (!$this->user->addToWishes->contains($productId)) {
            $this->dispatchBrowserEvent('alert', [
                'type'      => 'warning',
                'message'   => 'Product exists in your wish list!'
            ]);
            return null;
        }

        //remove product To user's wishlist
        $this->user->addToWishes()->detach($productId);

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'warning',
            'message'   => 'Product Removed Successfully'
        ]);
    }

    public function render()
    {
        $this->products = $this->user->addToWishes()->whereProductStatus(1)->latest()->get();
        $this->count = count($this->products);
        return view('livewire.frontend.product.user-wishlist-component', [
            'products' => $this->products,
            'count' => $this->count
        ]);
    }
}
