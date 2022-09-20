<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Edit extends Component
{
    public $name, $tagId, $name_en, $name_ar;

    public $old_name_en;
    public $old_name_ar;

    protected $listeners = [
        'editTag' => 'edit',
    ];

    protected function rules()
    {
        return [
            'name.en' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
            'name.ar' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        ];
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $id;
        $this->name_en = $tag->getTranslation('name', 'en');
        $this->name_ar = $tag->getTranslation('name', 'ar');

        //fix error en or ar null
        $this->old_name_en = $tag->getTranslation('name', 'en');
        $this->old_name_ar = $tag->getTranslation('name', 'ar');
    }

    public function update()
    {
        $this->validate();

        //validate tag unique
        $check = 0;

        //this will return a recode as collection if the values from $this->name array found, will be stored
        $collection = [];
        if (isset($this->name)) {
            foreach ($this->name as $el) {
                $collection[] = Tag::where('name', 'like', '%' . rtrim($el, " ") . '%')->get();
            }
        }
        //$collection has collections values stored as an array for each value is an array if the value exsits the $col count will be grater than 0 then increment $check by one
        if (isset($collection)) {
            foreach ($collection as $col) {
                if (count($col) > 0) {
                    $check++;
                }
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

        //fix error one of field are null: if user want to update only one field the other field will set to the old value
        if (isset($this->name['en']) && !empty($this->name['en'])) {
            $tag->setTranslation('name', 'en', $this->name['en']);
        } else {
            $tag->setTranslation('name', 'en', $this->old_name_en);
        }

        if (isset($this->name['ar']) && !empty($this->name['ar'])) {
            $tag->setTranslation('name', 'ar', $this->name['ar']);
        } else {
            $tag->setTranslation('name', 'ar', $this->old_name_ar);
        }


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
