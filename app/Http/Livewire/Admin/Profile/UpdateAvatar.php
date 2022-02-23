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
    public $removeBtn;
    public $avatarPath;
    public $name;

    protected $listeners = ['profileInfoUpdated' => 'infoChanged'];

    public function mount()
    {
        if ($this->admin->profile_photo_path == null) {
            $this->avatarPath = asset('backend/default-images/user.png');
            $this->removeBtn = "false";
        } else {
            $this->avatarPath = asset('storage/admin/' . $this->admin->profile_photo_path);
            $this->removeBtn = "true";
        }

        $this->name = $this->admin->first_name . ' ' . $this->admin->second_name;
    }

    protected $rules = [
        'profile_photo_path' => ['image', 'max:500', 'mimes:jpeg,png,jpg', 'dimensions:min_width=100,min_height=100,max_width=550,max_height=550'],
    ];

    protected $messages = [
        'profile_photo_path.image' => 'File Must Be An Image Type',
        'profile_photo_path.size' => 'Must Not Exceeds 500kB',
        'profile_photo_path.mimes' => 'File Must jpeg or png or jpg',
        'profile_photo_path.dimensions' => 'File Must Be Height Between 100:550, Width Between 100:550',
    ];

    /*
        / //FIXME if you didn't figure out how disable saving file upon selecting you must use ajax instead of livewire component because its obviously a security concern
    */
    public function update()
    {
        $this->validate();

        if ($this->admin->profile_photo_path !== null) {
            Storage::disk('admin')->delete($this->admin->profile_photo_path);
        }

        $avatar =  $this->profile_photo_path->store('profile', 'admin');

        Admin::whereId($this->admin->id)->update([
            'profile_photo_path' => $avatar
        ]);

        //to refresh avatar in header component
        $this->emit('avatarChanged');

        if ($this->removeBtn == "false") {

            $this->removeBtn = "true";
        }
        $this->avatarPath = asset('storage/admin/' . $avatar);

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Photo added successfully'
        ]);
    }

    public function infoChanged()
    {

        $this->name = $this->admin->first_name . ' ' . $this->admin->second_name;
    }


    /*
        ==> cleanupOldUploads <==
        /this will delete old avatar from livewire-tmp for each new image update
    */
    protected function cleanupOldUploads()
    {
        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            if (!$storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subSeconds(2)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function removeAvatar()
    {
        $this->removeBtn = "false";
        $this->avatarPath = asset('backend/default-images/user.png');
        Storage::disk('admin')->delete($this->admin->profile_photo_path);

        Admin::whereId($this->admin->id)->update([
            'profile_photo_path' => null
        ]);

        $this->emit('avatarChanged');

        $this->dispatchBrowserEvent('alert', [
            'type'  => 'success',
            'message' => 'Photo deleted successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-avatar');
    }
}
