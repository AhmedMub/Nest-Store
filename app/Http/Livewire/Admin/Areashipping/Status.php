<?php

namespace App\Http\Livewire\Admin\Areashipping;

use App\Models\AreaShipping;
use Livewire\Component;

class Status extends Component
{
    public AreaShipping $area;
    public string $name;
    public bool $status;

    public function mount()
    {
        $this->status = $this->area->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->area->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Area Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.areashipping.status');
    }
}
