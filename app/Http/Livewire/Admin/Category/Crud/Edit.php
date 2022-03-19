<?php

namespace App\Http\Livewire\Admin\Category\Crud;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public $catId;
    public $name_en;
    public $name_ar;
    public $icon;

    protected $listeners = ['editCategory' => 'edit'];

    //TODO must put security regex validation && must edit error messages because like on required message it reveals field name used in database
    protected $rules = [
        'name_en' => ['required'],
        'name_ar' => ['required']
    ];

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        $this->catId = $id;
        $this->name_en = $cat->name_en;
        $this->name_ar = $cat->name_ar;
    }

    public function update()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.admin.category.crud.edit');
    }
}
