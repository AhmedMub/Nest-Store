<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;

class Status extends Component
{
    public Slider $slider;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->slider->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->slider->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Slider Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.slider.status');
    }
}
