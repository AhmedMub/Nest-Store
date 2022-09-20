<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Product;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title_en, $title_ar, $description_en, $description_ar, $sliderImage;

    protected $rules = [
        'title_en' => ['required', 'string', 'unique:sliders', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'title_ar' => ['required', 'string', 'unique:sliders', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'description_en' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'description_ar' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'sliderImage' => ['required', 'image', 'max:10000'],
    ];

    protected $messages = [
        'title_en.required' => 'The English Title field is required',
        'title_ar.required' => 'The Arabic Title field is required',
    ];

    //Create Category
    public function create()
    {
        $validated = $this->validate();

        $slider = Slider::create($validated);

        //to add the slider Image
        $slider->addMedia($this->sliderImage->getRealPath())
            ->withResponsiveImages()
            ->toMediaCollection('slider');

        //reload if empty table
        $count = Slider::count();
        if ($count <= 1) {

            redirect()->route('slider');
        }

        $this->reset();

        //to reset image
        $this->dispatchBrowserEvent('ResetImage');

        $this->emit('newSliderAdded');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'New Slider Created Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.slider.create');
    }
}
