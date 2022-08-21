<?php

namespace App\Http\Livewire\Admin\Countryship;

use App\Models\DistrictShip;
use Livewire\Component;

class DistrictStatus extends Component
{
    public DistrictShip $district;
    public string $name;
    public bool $status;

    public function mount()
    {
        $this->status = $this->district->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->district->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'District Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.countryship.district-status');
    }
}
