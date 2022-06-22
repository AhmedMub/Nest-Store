<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Delete extends Component
{
    public $tagId;

    protected $listeners = ['deleteTag'];

    public function deleteTag($id)
    {
        $this->tagId = $id;
    }

    public function delete()
    {
        Tag::findOrFail($this->tagId)->delete();

        $this->emit('tagDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Tag Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product.tags.delete');
    }
}
