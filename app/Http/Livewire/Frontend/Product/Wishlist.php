<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public $product;
    public $user;



    public function mount($product, $user)
    {
        $this->product = $product;
        $this->user = $user;
    }


    public function wishList($user, $product)
    {
        if ($user == 0) {
            redirect()->route('login');
            return null;
        }

        $getUser = User::findOrFail($user);

        if ($getUser->addToWishes->contains($product)) {

            $this->dispatchBrowserEvent('alert', [
                'type'      => 'warning',
                'message'   => 'Product exists in your wish list!'
            ]);
            return null;
        }

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
