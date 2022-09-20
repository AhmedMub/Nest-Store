<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class HeaderAdminNameAvatar extends Component
{
    public $admin;
    public $avatar;
    public $name;
    public $roles;

    protected $listeners = [
        'profileInfoUpdated' => 'adminInfoChanged',
        'avatarChanged' => 'refreshAvatar'
    ];

    public function mount()
    {
        $this->name = $this->admin->first_name . ' ' . $this->admin->second_name;

        if ($this->admin->profile_photo_path == null) {
            $this->avatar = asset('backend/default-images/user.png');
        } else {
            $this->avatar = asset('storage/admin/' . $this->admin->profile_photo_path);
        }

        $this->roles = Role::count();
    }

    public function adminInfoChanged()
    {
        $this->name = $this->admin->first_name . ' ' . $this->admin->second_name;
    }

    public function refreshAvatar()
    {
        if ($this->admin->profile_photo_path == null) {
            $this->avatar = asset('backend/default-images/user.png');
        } else {
            $this->avatar = asset('storage/admin/' . $this->admin->profile_photo_path);
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.header-admin-name-avatar');
    }
}
