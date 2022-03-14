<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderAdminNameAvatar extends Component
{
    public $avatar;
    public $name;

    protected $listeners = [
        'profileInfoUpdated' => 'adminInfoChanged',
        'avatarChanged' => 'refreshAvatar'
    ];

    public function mount()
    {
        $this->name = Auth::user()->first_name . ' ' . Auth::user()->second_name;

        if (Auth::user()->profile_photo_path == null) {
            $this->avatar = asset('backend/default-images/user.png');
        } else {
            $this->avatar = asset('storage/admin/' . Auth::user()->profile_photo_path);
        }
    }

    public function adminInfoChanged()
    {
        $this->name = Auth::user()->first_name . ' ' . Auth::user()->second_name;
    }

    public function refreshAvatar()
    {
        if (Auth::user()->profile_photo_path == null) {
            $this->avatar = asset('backend/default-images/user.png');
        } else {
            $this->avatar = asset('storage/admin/' . Auth::user()->profile_photo_path);
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.header-admin-name-avatar');
    }
}
