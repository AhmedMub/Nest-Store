<?php

namespace App\Http\Livewire\Admin\Product\Discount;

use App\Models\Product;
use App\Models\ProductDiscount;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $description;
    public $discount_percent;
    public $product_id;
    public $discountId;
    public $selectedProductName;
    public $discounted_price;
    public $price;

    protected $listeners = ['editDiscount' => 'edit'];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
            'description' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
            'discount_percent' => ['required', 'integer'],
            'product_id' => ['required', 'integer', "unique:product_discounts,product_id,$this->discountId"],
        ];
    }

    protected $messages = [
        'name.required' => 'The Discount Name field is required',
        'discount_percent.required' => 'The Discount field is required',
        'product_id.required' => 'The Product field is required',
        'product_id.unique' => 'This Product Already Has A discount',
    ];

    public function edit($id)
    {
        $discount = ProductDiscount::findOrFail($id);
        $this->discountId = $discount->id;
        $this->name = $discount->name;
        $this->description = $discount->description;
        $this->discount_percent = $discount->discount_percent;
        $this->product_id = $discount->productDiscount->id;
        $this->selectedProductName = $discount->productDiscount->name_en;
        $this->price = $discount->productDiscount->price;
    }

    public function update()
    {
        $validated = $this->validate();

        ProductDiscount::whereId($this->discountId)->update($validated);

        $this->calcDiscountedPrice($this->discountId);

        $this->emit('discountUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Discount Updated Successfully'
        ]);
    }

    public function calcDiscountedPrice($discountId)
    {
        $productPrice = $this->price;
        $discount = $this->discount_percent / 100;
        $priceAfterDiscount = floatval(round($productPrice - ($productPrice * $discount)));
        ProductDiscount::whereId($discountId)->update([
            'discounted_price' => $priceAfterDiscount,
        ]);
    }

    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.admin.product.discount.edit', compact('products'));
    }
}
