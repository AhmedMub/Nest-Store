<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Create extends Component
{
    public $name_ar;
    public $name_en;
    public $category_id;

    protected $rules = [
        'name_en' => ['required', 'string', 'unique:sub_categories', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'name_ar' => ['required', 'string', 'unique:sub_categories', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'category_id' => ['required', 'integer'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'category_id.required' => 'The Main Category field is required',
    ];

    public function create()
    {
        $count = SubCategory::count();

        $this->validate();

        SubCategory::create([
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'category_id' => $this->category_id,
        ]);

        if ($count < 1) {

            redirect()->route('subcategory');
        }

        $this->emit('subCatAdded');

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Subcategory Added Successfully',
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.subcategory.create', [
            'categories' => $categories,
        ]);
    }
}
