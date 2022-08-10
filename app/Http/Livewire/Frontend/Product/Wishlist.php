<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Wishlist extends Component
{

    //TODO must include remove from wish list

    protected $listeners = [
        'addToWishList' => 'wishList',
    ];

    public function wishList($user, $product)
    {
        //this is to validate incoming requests data to prevent any other time of data injections
        $valid = [
            'user' => $user,
            'product' => $product,
        ];
        Validator::make(
            $valid,
            [
                'user' => 'numeric|digits_between:1,7',
                'product' => 'numeric|digits_between:1,7'
            ]
        )->validate();
        //check user auth, if user = 0 means user not auth
        if ($user == 0) {
            redirect()->route('login');
            return null;
        }


        $getUser = User::findOrFail($user);

        //check if use has duplicate products if user already has the selected product to his wishList
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
