<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class UpdateAvatar extends Component
{
    use WithFileUploads;

    public $admin;
    public $profile_photo_path;
    public $removeBtn = "false";
    public $avatarPath;

    public function mount()
    {

        if ($this->admin->profile_photo_path == null) {

            $this->avatarPath = asset('backend/default-images/user.png');
        }
    }

    public function update()
    {
        if ($this->removeBtn == "false") {

            $this->removeBtn = "true";
        }
        if ($this->admin->profile_photo_path !== null) {
            Storage::disk('admin')->delete($this->admin->profile_photo_path);
        }
        $this->validate([
            'profile_photo_path' => 'image|max:500',
        ]);

        $avatar =  $this->profile_photo_path->store('profile', 'admin');

        Admin::whereId($this->admin->id)->update([
            'profile_photo_path' => $avatar
        ]);
        session()->flash('message', 'image updated successfully 😀');
    }

    public function removeAvatar()
    {
        $this->reset('removeBtn');
        Storage::disk('admin')->delete($this->admin->profile_photo_path);

        Admin::whereId($this->admin->id)->update([
            'profile_photo_path' => null
        ]);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-avatar');
    }
}
