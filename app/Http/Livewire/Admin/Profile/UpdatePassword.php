<?php

namespace App\Http\Livewire\Admin\Profile;

use Illuminate\Support\Arr;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $admin = [];

    protected $rules = [
        'admin.current_password' => ['required'],
        'admin.password' => ['required'],
        'admin.password_confirmation' => ['required'],
    ];

    public function mount()
    {
        $this->admin = auth()->user();
    }

    //Change Password Functionality using Laravel Fortify Livewire
    //NOTE UpdatesUserPasswords this is an class interface only implements what interface has as well as implements what App\Actions\Fortify\UpdateUserPassword class functionality
    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(auth()->user(), [

            'current_password' => $this->admin['current_password'],
            'password' => $this->admin['password'],
            'password_confirmation' => $this->admin['password_confirmation']
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Password Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-password');
    }
}
