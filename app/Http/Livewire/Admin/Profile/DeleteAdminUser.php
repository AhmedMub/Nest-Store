<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteAdminUser extends Component
{
    public $admin;
    public function delete()
    {
        $image = Admin::findOrFail($this->admin->id)->profile_photo_path;
        //check if field not null
        if ($image !== null) {
            Storage::delete('public/admin/profile/' . $image);
        }

        Admin::whereId($this->admin->id)->delete();

        return redirect()->intended('admin/login');
    }

    public function render()
    {
        return view('livewire.admin.profile.delete-admin-user');
    }
}
