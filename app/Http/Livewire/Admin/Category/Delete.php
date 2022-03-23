<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Delete extends Component
{
    public $catId;

    protected $listeners = ['deleteCat'];

    public function deleteCat($id)
    {

        $this->catId = $id;
    }

    public function delete()
    {

        Category::whereId($this->catId)->delete();

        $this->emit('catDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Category Deleted Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.delete');
    }
}
