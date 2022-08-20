<?php

namespace App\Http\Livewire\Admin\Countryship;

use App\Models\CountryShip;
use Livewire\Component;

class Create extends Component
{
    public $country;

    protected $rules = [
        'country' => ['required', 'string', 'unique:country_ships'],
    ];

    public function create()
    {
        $validate = $this->validate();

        $count = CountryShip::count();

        //refresh page
        if ($count <= 1) {
            redirect()->route('countryShip');
        }

        CountryShip::create($validate);

        $this->emit('newCountryAdded');

        $this->dispatchBrowserEvent('resetSelect');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'New Country Added Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.countryship.create');
    }
}
