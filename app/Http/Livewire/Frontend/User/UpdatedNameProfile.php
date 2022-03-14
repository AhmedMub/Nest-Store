<?php

namespace App\Http\Livewire\Frontend\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdatedNameProfile extends Component
{
    public $first_name;
    public $second_name;

    protected $listeners = ['userProfileUpdated' => 'refreshName'];

    public function mount()
    {
        $this->first_name = Auth::user()->first_name;
        $this->second_name = Auth::user()->second_name;
    }

    public function refreshName()
    {
        $this->first_name = Auth::user()->first_name;
        $this->second_name = Auth::user()->second_name;
    }

    public function render()
    {
        return view('livewire.frontend.user.updated-name-profile');
    }
}
