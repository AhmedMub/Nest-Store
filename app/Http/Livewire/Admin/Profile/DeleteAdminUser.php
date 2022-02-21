<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Livewire\Component;

class DeleteAdminUser extends Component
{
    public $admin;
    public function delete()
    {
        Admin::whereId($this->admin->id)->delete();

        return redirect()->intended('admin/login');
    }

    public function render()
    {
        return view('livewire.admin.profile.delete-admin-user');
    }
}
