<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;


class Edit extends Component
{
    use WithFileUploads;

    public $catId;
    public $name_en;
    public $name_ar;
    public $icon;
    public $default_icon;

    protected $listeners = ['editCategory' => 'edit'];

    protected function rules()
    {
        return [
            'name_en' => ['required', "string", 'regex:/^[a-z0-9\s]*$/i', "unique:categories,name_en,$this->catId"],
            'name_ar' => ['required', "string", 'regex:/^[a-z0-9\s]*$/i', "unique:categories,name_ar,$this->catId"]
        ];
    }
    protected $messages = [
        'name_en.required' => "The English Name field is required",
        'name_ar.required' => "The Arabic Name field is required"
    ];

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        $this->catId = $id;
        $this->name_en = $cat->name_en;
        $this->name_ar = $cat->name_ar;
    }

    //Update Category
    public function update()
    {
        $this->validate();

        //save and resize Image if exists
        if (!$this->default_icon && $this->icon) {

            $image = $this->uploadImage();
            Category::whereId($this->catId)->update([
                'name_en' => $this->name_en,
                'name_ar' => $this->name_ar,
                'icon' => $image,
            ]);
            $this->updatedCategory();
        } elseif (!$this->icon && $this->default_icon) {
            Category::whereId($this->catId)->update([
                'name_en' => $this->name_en,
                'name_ar' => $this->name_ar,
                'default_icon' => $this->default_icon,
            ]);
            $this->updatedCategory();
        } elseif ($this->icon && $this->default_icon) {
            $this->dispatchBrowserEvent('alert', [
                'type'      => 'error',
                'message'   => 'Only Custom Icon Or Default Icon Should Be Added'
            ]);
            $this->reset(['default_icon', 'icon']);
        } else {
            Category::whereId($this->catId)->update([
                'name_en' => $this->name_en,
                'name_ar' => $this->name_ar,
            ]);
            $this->updatedCategory();
        }
    }

    public function uploadImage()
    {
        if (!$this->icon) {
            return null;
        }

        $oldImage = Category::findOrFail($this->catId)->icon;

        if ($oldImage !== null) {
            Storage::delete('public/frontend/categories/' . $oldImage);
        }

        $image = $this->icon;

        $imageName = $image->hashName();

        $img = Image::make($image->getRealPath())->resize(80, 80, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->stream();
        Storage::disk('frontend')->put('categories' . '/' . $imageName, $img);

        return $imageName;
    }

    public function updatedCategory()
    {
        $this->reset(['default_icon', 'icon']);
        $this->emit('categoryUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Category Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
