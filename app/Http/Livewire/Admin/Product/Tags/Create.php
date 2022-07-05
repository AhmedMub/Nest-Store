<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use App\Models\Product;
use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{

    public $name_en, $name_ar, $product_id;

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'name_en' => ['required', 'string', 'unique:tags'],
        'name_ar' => ['required', 'string', 'unique:tags'],
        'product_id' => ['required', 'integer'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'product_id.required' => 'Must choose main category'
    ];

    //Create Category
    public function create()
    {
        $validated = $this->validate();

        $product = Product::findOrFail($this->product_id);

        $tag = Tag::create($validated);

        $product->productTags()->save($tag);

        //if no tags should be reloaded once
        $count = Tag::count();
        if ($count <= 1) {

            redirect()->route('product.tags');
        }
        $this->reset();
        $this->emit('newTagCreated');
        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'New Tag Created Successfully'
        ]);
    }

    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.admin.product.tags.create', compact('products'));
    }
}
