<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Create extends Component
{

    public $name, $status;

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'name' => ['required', 'string', 'unique:tags'],
    ];

    protected $messages = [
        'name.required' => 'The Name field is required',
    ];

    //Create Category
    public function create()
    {
        $validated = $this->validate();

        Tag::create($validated);

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
        return view('livewire.admin.product.tags.create');
    }
}
