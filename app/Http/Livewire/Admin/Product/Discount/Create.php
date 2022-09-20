<?php

namespace App\Http\Livewire\Admin\Product\Discount;

use App\Models\Product;
use App\Models\ProductDiscount;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $description;
    public $discount_percent;
    public $product_id;
    public $discounted_price;

    protected $rules = [
        'name' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'description' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'discount_percent' => ['required', 'integer'],
        'product_id' => ['required', 'integer', 'unique:product_discounts'],
    ];

    protected $messages = [
        'name.required' => 'The Discount Name field is required',
        'discount_percent.required' => 'The Discount field is required',
        'product_id.required' => 'The Product field is required',
        'product_id.unique' => 'This Product Already Has A discount',
    ];

    public function create()
    {
        $count = ProductDiscount::count();

        $validate = $this->validate();

        $newDiscount = ProductDiscount::create($validate);

        $this->calcDiscountedPrice($newDiscount->id);

        if ($count < 1) {

            redirect()->route('product.discount');
        }

        $this->emit('newDiscountAdded');

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Product Discount Added Successfully',
        ]);
    }

    //add discounted price after discount has been set;
    public function calcDiscountedPrice($discountId)
    {
        $productPrice = Product::findOrFail($this->product_id)->price;
        $discount = $this->discount_percent / 100;
        $priceAfterDiscount = floatval(round($productPrice - ($productPrice * $discount)));
        ProductDiscount::whereId($discountId)->update([
            'discounted_price' => $priceAfterDiscount,
        ]);
    }
    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.admin.product.discount.create', compact('products'));
    }
}
