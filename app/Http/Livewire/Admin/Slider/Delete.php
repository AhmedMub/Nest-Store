<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;

class Delete extends Component
{
    public $slider;

    protected $listeners = ['deleteSlider'];

    public function deleteSlider($id)
    {

        $this->slider = $id;
    }

    public function delete()
    {

        Slider::findOrFail($this->slider)->delete();

        $this->emit('sliderDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Slider Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.slider.delete');
    }
}
