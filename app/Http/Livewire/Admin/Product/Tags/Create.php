<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Create extends Component
{
    public $name, $status;

    //TODO must add security regex && must add custom messages because in required it returnes field name which is risky
    protected $rules = [
        'name.en' => ['required', 'string'],
        'name.ar' => ['required', 'string'],
    ];

    protected $messages = [
        'name.en.required' => 'This field is required',
        'name.ar.required' => 'This field is required',
    ];

    //Create Category
    public function create()
    {
        $this->validate();

        //validate tag unique
        $check = 0;

        //this will return a recode as collection if the values from $this->name array found, will be stored
        $collection = [];
        foreach ($this->name as $el) {
            $collection[] = Tag::where('name', 'like', '%' . rtrim($el, " ") . '%')->get();
        }
        //$collection has collections values stored as an array for each value is an array if the value exsits the $col count will be grater than 0 then increment $check by one
        foreach ($collection as $col) {
            if (count($col) > 0) {
                $check++;
            }
        }
        //if $check value grater than 0 then the input value already exists in the DB will return null to stop the rest of the function statements
        if ($check > 0) {
            $this->dispatchBrowserEvent('alert', [
                'type'      => 'error',
                'message'   => 'Tag name already exists'
            ]);
            return null;
        }

        $tag = new Tag;

        $tag->setTranslation('name', 'en', trim($this->name['en'], " "))
            ->setTranslation('name', 'ar', trim($this->name['ar'], " "))
            ->save();


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
