<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => ['required'],
        'password' => ['required', 'string'],
        'password_confirmation' => ['required', 'same:password'],
    ];

    public function changePassword()
    {

        $admin = Auth::guard('admin')->user();

        //check old password
        if (!Hash::check($this->current_password, $admin->password)) {
            $this->addError('current_password', 'The provided password does not match your current password.');
            return null;
        }
        $this->validate();

        $admin->update([
            'password' => Hash::make($this->password)
        ]);

        if ($admin) {
            $this->reset();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Password changed successfully'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.update-password');
    }
}
