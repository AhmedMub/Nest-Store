<?php

namespace App\Http\Livewire\Admin\Category\Crud;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use WithFileUploads;

    public $name_en, $name_ar, $icon, $status, $slug, $default_icon, $default_icon_status;


    //TODO must add security regex
    protected $rules = [
        'name_en' => ['required', 'string', 'unique:categories'],
        'name_ar' => ['required', 'string', 'unique:categories'],
        'icon' => ['nullable', 'image', 'max:500', 'mimes:jpeg,png,jpg,svg'],
        'default_icon' => ['nullable']
    ];

    //Create Category
    public function create()
    {
        dd($this->default_icon);
        // Category::create([
        //     'name_en' => $this->name_en,
        //     'name_ar' => $this->name_ar,
        //     'default_icon' => $this->default_icon,
        // ]);
        // $this->addedCategory();

        // $this->validate();
        // //save and resize Image if exists
        // if (!$this->default_icon && $this->icon) {
        //     $image = $this->uploadImage();
        //     Category::create([
        //         'name_en' => $this->name_en,
        //         'name_ar' => $this->name_ar,
        //         'icon' => $image,
        //     ]);
        //     $this->addedCategory();
        // } elseif (!$this->icon && $this->default_icon) {
        //     Category::create([
        //         'name_en' => $this->name_en,
        //         'name_ar' => $this->name_ar,
        //         'default_icon' => $this->default_icon,
        //     ]);
        //     $this->addedCategory();
        // } elseif ($this->icon && $this->default_icon) {
        //     $this->dispatchBrowserEvent('alert', [
        //         'type'      => 'error',
        //         'message'   => 'Only Custom Icon Or Default Icon Should Be Added'
        //     ]);
        //     $this->reset('default_icon');
        // } else {
        //     Category::create([
        //         'name_en' => $this->name_en,
        //         'name_ar' => $this->name_ar,
        //     ]);
        //     $this->addedCategory();
        // }
    }

    public function uploadImage()
    {
        if (!$this->icon) {
            return null;
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

    public function addedCategory()
    {
        $count = Category::count();

        //refresh page only if there is no data and new just added
        if ($count <= 1) {

            redirect()->route('all.cats');
        }
        $this->reset();

        $this->emit('newCatAdded');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Category Created Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.category.crud.create');
    }
}
