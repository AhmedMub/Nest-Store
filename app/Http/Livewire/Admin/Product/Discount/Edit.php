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
    public $selectedProductId;
    public $selectedProductName;

    protected $listeners = ['editDiscount' => 'edit'];

    //TODO must add more validation with more messages and regex validation
    protected $rules = [
        'name' => ['required', 'string'],
        'description' => ['nullable', 'string'],
        'discount_percent' => ['required', 'integer'],
        'product_id' => ['required', 'integer'],
    ];

    protected $messages = [
        'name.required' => 'The Discount Name field is required',
        'discount_percent.required' => 'The Discount field is required',
        'product_id.required' => 'The Product field is required',
    ];

    public function edit($id)
    {
        $discount = ProductDiscount::findOrFail($id);
        $this->discountId = $discount->id;
        $this->name = $discount->name;
        $this->description = $discount->description;
        $this->discount_percent = $discount->discount_percent;
        $this->product_id = $discount->product_id;
        $this->selectedProductId = $discount->productDiscount->id;
        $this->selectedProductName = $discount->productDiscount->name_en;
    }

    public function update()
    {
        $validated = $this->validate();

        ProductDiscount::whereId($this->discountId)->update($validated);

        $this->emit('discountUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Discount Updated Successfully'
        ]);
    }
    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.admin.product.discount.edit', compact('products'));
    }
}
