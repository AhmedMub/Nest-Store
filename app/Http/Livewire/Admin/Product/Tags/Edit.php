<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Edit extends Component
{
    public $name, $tagId, $name_en, $name_ar;

    protected $listeners = [
        'editTag' => 'edit',
    ];

    //TODO must put security regex validation && must edit error messages because like on required message it reveals field name used in database
    protected function rules()
    {
        return [
            'name.en' => ['required', 'string'],
            'name.ar' => ['required', 'string'],
        ];
    }
    protected $messages = [
        'name.en.required' => 'This field is required',
        'name.ar.required' => 'This field is required',
    ];

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $id;
        $this->name_en = $tag->getTranslation('name', 'en');
        $this->name_ar = $tag->getTranslation('name', 'ar');
    }

    public function update()
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

        $tag = Tag::findOrFail($this->tagId);

        $tag->setTranslation('name', 'en', $this->name['en']);
        $tag->setTranslation('name', 'ar', $this->name['ar']);

        $tag->save();

        $this->edit($this->tagId);

        $this->emit('tagUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Tag Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product.tags.edit');
    }
}
