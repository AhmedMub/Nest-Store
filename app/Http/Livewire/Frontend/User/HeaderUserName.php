<?php

namespace App\Http\Livewire\Frontend\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderUserName extends Component
{
    public $first_name;

    protected $listeners = ['userProfileUpdated' => 'refreshName'];

    public function mount()
    {
        $this->first_name = Auth::user()->first_name;
    }

    public function refreshName()
    {
        $this->first_name = Auth::user()->first_name;
    }
    public function render()
    {
        return view('livewire.frontend.user.header-user-name');
    }
}
