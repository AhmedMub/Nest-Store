<?php

namespace App\Http\Livewire\Admin\Countryship;

use App\Models\CountryShip;
use Livewire\Component;

class CountryStatus extends Component
{
    public CountryShip $country;
    public string $name;
    public bool $status;

    public function mount()
    {
        $this->status = $this->country->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->country->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Country Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.countryship.country-status');
    }
}
