<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Livewire\Component;

class Edit extends Component
{
    public $name_ar;
    public $name_en;
    public $selectedMainCat;
    public $subSubCatId;
    public $category_id;

    protected $listeners = [
        'editSubcategory',
    ];

    //protected $rules=[] not working with if $this->subCatId passed
    protected function rules()
    {
        return [
            'name_en' => ['required', 'string', "unique:sub_categories,name_en,$this->subSubCatId"],
            'name_ar' => ['required', 'string', "unique:sub_categories,name_ar,$this->subSubCatId"],
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
        $subSubCat = SubSubcategory::findOrFail($id);
        $this->subSubCatId = $subSubCat->id;
        $this->name_en = $subSubCat->name_en;
        $this->name_ar = $subSubCat->name_ar;
        //$this->selectedMainCat = $subSubCat->mainCats->name_en;
        // $this->category_id = $subSubCat->mainCats->id;
    }

    public function update()
    {
        $updateSubSubCat = $this->validate();

        SubSubcategory::whereId($this->subCatId)->update($updateSubSubCat);

        $this->emit('subSubCatUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Sub-Subcategory Updated Successfully',
        ]);
    }
    public function render()
    {
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        return view('livewire.admin.sub-subcategory.edit', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
