<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class UpdatePassword extends Component
{
    public $admin;

    public function render()
    {
        return view('livewire.admin.profile.update-password');
    }
}
