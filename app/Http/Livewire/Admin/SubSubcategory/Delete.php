<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\SubSubcategory;
use Livewire\Component;

class Delete extends Component
{
    public $catId;

    protected $listeners = ['deleteSubsubCat'];

    public function deleteSubsubCat($id)
    {

        $this->catId = $id;
    }

    public function delete()
    {

        SubSubcategory::whereId($this->catId)->delete();

        $this->emit('subSubCatDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Category Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.sub-subcategory.delete');
    }
}
