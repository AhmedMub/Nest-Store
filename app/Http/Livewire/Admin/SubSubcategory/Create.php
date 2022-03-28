<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Livewire\Component;

class Create extends Component
{
    public $name_ar;
    public $name_en;
    public $category_id;
    public $subcategory_id;

    //TODO must add more validation with more messages and regex validation
    protected $rules = [
        'name_en' => ['required', 'string', 'unique:sub_categories'],
        'name_ar' => ['required', 'string', 'unique:sub_categories'],
        'category_id' => ['required', 'integer'],
        'subcategory_id' => ['required', 'integer'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'category_id.required' => 'The Main Category field is required',
        'subcategory_id.required' => 'The Sub-Subcategory field is required',
    ];

    public function create()
    {
        $count = SubSubcategory::count();

        $this->validate();

        SubSubcategory::create([
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
        ]);

        if ($count < 1) {

            redirect()->route('sub.subcategory');
        }

        $this->emit('newSubSubcategoryAdded');

        $this->reset();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Sub-Subcategory Added Successfully',
        ]);
    }

    public function render()
    {
        $categories = Category::all();
        $subcategory = SubCategory::all();
        return view('livewire.admin.sub-subcategory.create', [
            'categories' => $categories,
            'subcategory' => $subcategory,
        ]);
    }
}
