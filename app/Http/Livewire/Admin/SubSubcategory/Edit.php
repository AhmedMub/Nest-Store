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
    public $selectedSubCat;
    public $subcategory_id;

    protected $listeners = [
        'editSubSubcategory',
    ];

    //protected $rules=[] not working with if $this->subSubCatId passed
    protected function rules()
    {
        return [
            'name_en' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', "unique:sub_categories,name_en,$this->subSubCatId"],
            'name_ar' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i', "unique:sub_categories,name_ar,$this->subSubCatId"],
            'subcategory_id' => ['required', 'integer'],
        ];
    }

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The Arabic Name field is required',
        'subcategory_id.required' => 'The Main Category field is required',
    ];


    public function editSubSubcategory($id)
    {
        $subSubCat = SubSubcategory::findOrFail($id);
        $this->subSubCatId = $subSubCat->id;
        $this->name_en = $subSubCat->name_en;
        $this->name_ar = $subSubCat->name_ar;
        $this->selectedSubCat = $subSubCat->belongToSubCategory->name_en;

        //you won't need it but it must have a default value because if user change any other field other then subcategory_id won't return null
        $this->subcategory_id = $subSubCat->belongToSubCategory->id;
    }

    public function update()
    {
        $updateSubSubCat = $this->validate();

        SubSubcategory::whereId($this->subSubCatId)->update($updateSubSubCat);

        $this->emit('subSubCatUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Sub-Subcategory Updated Successfully',
        ]);
    }
    public function render()
    {
        $subCategories = SubCategory::latest()->get();
        return view('livewire.admin.sub-subcategory.edit', compact('subCategories'));
    }
}
