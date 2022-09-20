<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class Edit extends Component
{
    public $name_ar;
    public $name_en;
    public $selectedMainCat;
    public $subCatId;
    public $category_id;

    protected $listeners = [
        'editSubcategory',
    ];

    //protected $rules=[] not working with if $this->subCatId passed
    protected function rules()
    {
        return [
            'name_en' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', "unique:sub_categories,name_en,$this->subCatId"],
            'name_ar' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', "unique:sub_categories,name_ar,$this->subCatId"],
            'category_id' => ['required', 'integer'],
        ];
    }

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'category_id.required' => 'The Main Category field is required',
    ];


    public function editSubcategory($id)
    {
        $subCat = SubCategory::findOrFail($id);
        $this->subCatId = $subCat->id;
        $this->name_en = $subCat->name_en;
        $this->name_ar = $subCat->name_ar;
        $this->selectedMainCat = $subCat->mainCats->name_en;
        $this->category_id = $subCat->mainCats->id;
    }

    public function update()
    {
        $updateSubCat = $this->validate();

        SubCategory::whereId($this->subCatId)->update($updateSubCat);

        $this->emit('subCatUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Subcategory Updated Successfully',
        ]);
    }
    public function render()
    {
        $categories = Category::latest()->get();

        return view('livewire.admin.subcategory.edit', [
            'categories' => $categories,
        ]);
    }
}
