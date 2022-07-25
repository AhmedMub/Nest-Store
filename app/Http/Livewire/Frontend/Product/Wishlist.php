<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{

    //TODO must include remove from wish list

    protected $listeners = [
        'addToWishList' => 'wishList',
    ];

    public function wishList($user, $product)
    {
        if ($user == 0) {
            redirect()->route('login');
            return null;
        }

        $getUser = User::findOrFail($user);

        //check if user already has the selected product to his wishList
        if ($getUser->addToWishes->contains($product)) {
            $this->dispatchBrowserEvent('alert', [
                'type'      => 'warning',
                'message'   => 'Product exists in your wish list!'
            ]);
            return null;
        }

        //add product To user's wishlist
        $getUser->addToWishes()->attach($product);

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Product Added Successfully'
        ]);
    }


    public function render()
    {
        return view('livewire.frontend.product.wishlist');
    }
}
