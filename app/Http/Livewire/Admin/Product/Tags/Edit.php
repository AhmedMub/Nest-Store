<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Edit extends Component
{
    public $name, $tagId;

    protected $listeners = ['editTag' => 'edit'];

    //TODO must put security regex validation && must edit error messages because like on required message it reveals field name used in database
    protected function rules()
    {
        return [
            'name' => ['required', 'string', "unique:tags,name,$this->tagId"],
        ];
    }
    protected $messages = [
        "name.required" => "The Name field is required"
    ];

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $id;
        $this->name = $tag->name;
    }

    public function update()
    {
        $validated = $this->validate();

        Tag::findOrFail($this->tagId)->update($validated);

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
