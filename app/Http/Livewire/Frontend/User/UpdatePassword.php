<?php

namespace App\Http\Livewire\Frontend\User;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;


class UpdatePassword extends Component
{
    public $user = [];

    protected $listeners = ['redirectToLogin' => 'redirectToLogin'];

    protected $rules = [
        'user.current_password' => ['required'],
        'user.password' => ['required'],
        'user.password_confirmation' => ['required'],
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    //Change Password Functionality using Laravel Fortify Livewire
    //NOTE UpdatesUserPasswords this is an class interface only implements what interface has as well as implements what App\Actions\Fortify\UpdateUserPassword class functionality
    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(auth()->user(), [

            'current_password' => $this->user['current_password'],
            'password' => $this->user['password'],
            'password_confirmation' => $this->user['password_confirmation']
        ]);

        return Redirect::route('user.profile');
    }

    public function render()
    {
        return view('livewire.frontend.user.update-password');
    }
}
