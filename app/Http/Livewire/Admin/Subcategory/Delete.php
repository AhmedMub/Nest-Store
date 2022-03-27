<?php

namespace App\Http\Livewire\Admin\Subcategory;

use Livewire\Component;
use App\Models\SubCategory;

class Delete extends Component
{
    public $catId;

    protected $listeners = ['deleteSubCat'];

    public function deleteSubCat($id)
    {

        $this->catId = $id;
    }

    public function delete()
    {

        SubCategory::whereId($this->catId)->delete();

        $this->emit('subCatDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Category Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.subcategory.delete');
    }
}
