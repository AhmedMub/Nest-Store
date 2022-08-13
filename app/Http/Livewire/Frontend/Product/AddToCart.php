<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;
    public $user;
    public $count = 1;
    public $price;
    public array $qty = [];
    public $cartContent;
    public $existingProduct;

    public function mount($product, $user)
    {
        $this->product = $product;
        $this->user = $user;
        $this->cartContent = Cart::content();
    }

    public function minus()
    {
        if ($this->count <= 1) {

            return null;
        }
        $this->count--;
    }
    public function plus()
    {
        $this->count++;
    }

    public function addToCart($id)
    {
        $cart = Cart::content();
        if (count($cart) > 0) {
            foreach ($cart as $key => $product) {
                if ($product->id  == $id) {
                    $this->existingProduct = $key;
                }
            }
        }
        $getProduct = Product::findOrFail($id);

        $this->qty[$id] = $this->count;

        //check if there is a discounted price
        if (
            !empty($getProduct->productDiscount->discount_percent) &&
            $getProduct->discount_status == 1
        ) {
            $this->price = $getProduct->productDiscount->discounted_price;
        } else {
            $this->price = $getProduct->price;
        }

        //FIXME must check if the product exist in cart should update not add
        if (isset($this->existingProduct)) {
            Cart::update($this->existingProduct, 2);
        } else {
            //add to cart
            Cart::add($getProduct->id, $getProduct->name_en, $this->qty[$id], $this->price, 0, ['options' => $getProduct->getFirstMediaUrl('mainImage')]);
        }


        //FIXME not updating count
        $this->count == 1;
        $this->emit('refreshCart');
    }

    public function render()
    {

        return view('livewire.frontend.product.add-to-cart');
    }
}
