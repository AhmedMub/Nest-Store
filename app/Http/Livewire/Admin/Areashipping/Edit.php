<?php

namespace App\Http\Livewire\Admin\Areashipping;

use Livewire\Component;

class Edit extends Component
{
    public $country;
    public function render()
    {
        return view('livewire.admin.areashipping.edit');
    }
}
