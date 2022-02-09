<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class UpdateProfileInformation extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.admin.profile.update-profile-information');
    }
}
