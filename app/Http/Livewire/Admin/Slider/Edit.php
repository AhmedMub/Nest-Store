<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $title_en, $title_ar, $description_en, $description_ar, $sliderImage, $slider_id;

    protected $listeners = [
        'editSlider',
    ];

    //protected $rules=[] not working with if $this->subCatId passed
    protected function rules()
    {
        return [
            'title_en' => ['required', 'string', "unique:sliders,title_en,$this->slider_id"],
            'title_ar' => ['required', 'string', "unique:sliders,title_ar,$this->slider_id"],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'sliderImage' => ['nullable', 'image', 'max:10000'],
        ];
    }

    protected $messages = [
        'title_en.required' => 'The English Title field is required',
        'title_ar.required' => 'The Arabic Title field is required',
    ];


    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $this->slider_id = $id;
        $this->title_en = $slider->title_en;
        $this->title_ar = $slider->title_ar;
        $this->description_en = $slider->description_en;
        $this->description_ar = $slider->description_ar;
    }

    public function update()
    {
        $validate = $this->validate();

        $editSlider = Slider::findOrFail($this->slider_id);

        $editSlider->update($validate);

        //to add the slider Image if slider updated the old image will be replaced with the updated
        if (isset($this->sliderImage)) {
            $editSlider->addMedia($this->sliderImage->getRealPath())
                ->withResponsiveImages()
                ->toMediaCollection('slider');
        }

        $this->emit('sliderUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Slider $this->title_en Updated Successfully",
        ]);
    }

    public function render()
    {
        return view('livewire.admin.slider.edit');
    }
}
