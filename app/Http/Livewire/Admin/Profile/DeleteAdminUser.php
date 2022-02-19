<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class DeleteAdminUser extends Component
{
    public $admin;

    public function render()
    {
        return view('livewire.admin.profile.delete-admin-user');
    }
}
