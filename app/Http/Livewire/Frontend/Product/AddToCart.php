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

        //check the cart has items
        if (count($cart) > 0) {
            //this is to get the rowId and save it to $existingProduct to update item qty
            foreach ($cart as $key => $product) {
                if ($product->id  == $id) {
                    $this->existingProduct = $key;
                }
            }
        }
        //find the product
        $getProduct = Product::findOrFail($id);

        //to attache item id as a key and qty as value for "Cart::", this is updated variable by "minus & plus"
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

        //must check if the product already exists in cart should update the qty
        if (isset($this->existingProduct)) {
            Cart::update($this->existingProduct, $this->qty[$id]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Product Updated Successfully'
            ]);
        } else {
            //if item not exist in cart will be added to cart
            Cart::add($getProduct->id, $getProduct->name_en, $this->qty[$id], $this->price, 0, ['options' => $getProduct->getFirstMediaUrl('mainImage'), 'slug' => $getProduct->slug]);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Product Add To Cart Successfully'
            ]);
        }

        $this->emit('refreshCart');
    }

    public function render()
    {

        return view('livewire.frontend.product.add-to-cart');
    }
}
