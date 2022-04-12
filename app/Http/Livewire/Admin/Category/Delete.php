<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
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
        $catIcon = Category::findOrFail($this->catId)->icon;
        //check if field not null
        if ($catIcon !== null) {
            Storage::delete('public/frontend/categories/' . $catIcon);
        }

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
