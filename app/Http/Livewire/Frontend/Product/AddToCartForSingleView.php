<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCartForSingleView extends Component
{
    //this the product id
    public $product;

    public $classes;

    public $existingProduct;

    //initial values
    public $count = 1;
    public $price = 0;

    public array $qty = [];

    protected $listeners = ['addFromWishlist' => 'addToCart'];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        $cart = Cart::content();
        //check the cart has items
        if (count($cart) > 0) {
            //this is to get the rowId and save it to $existingProduct to update item qty
            foreach ($cart as $key => $item) {
                if ($item->id  == $productId) {
                    $this->existingProduct = $key;
                }
            }
        }

        //find the product
        $getProduct = Product::findOrFail($productId);

        //to attache item id as a key and qty as value for "Cart::", this is updated variable by "minus & plus"
        $this->qty[$productId] = $this->count;

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
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'Product Already Exists In Cart Or Refresh The Page'
            ]);
        } else {
            //if item not exist in cart will be added to cart
            Cart::add($getProduct->id, $getProduct->name_en, $this->qty[$productId], $this->price, 0, ['options' => $getProduct->getFirstMediaUrl('mainImage'), 'slug' => $getProduct->slug]);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Product Add To Cart Successfully'
            ]);
        }

        $this->emit('refreshCart');
    }

    public function render()
    {
        return view('livewire.frontend.product.add-to-cart-for-single-view');
    }
}
