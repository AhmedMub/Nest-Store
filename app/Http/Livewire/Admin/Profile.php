<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $first_name, $second_name, $email, $phone_number, $password, $password_confirmation;
    protected $current_password;

    public function mount($admin)
    {
        $this->first_name   = $admin->first_name;
        $this->second_name  = $admin->second_name;
        $this->email        = $admin->email;
        $this->phone_number = $admin->phone_number;
        $this->current_password = $admin->password;
    }


    //form validation
    protected $rules = [
        'first_name' => ['required'],
        'second_name' => ['required'],
        'email' => ['required'],
        'phone_number' => ['required'],
        'password' => ['required'],
        'password_confirmation' => ['required', 'same:password']

    ];

    protected $messages = [
        'password_confirmation' => 'test'
    ];

    //this is for real-time validation
    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function update()
    {
        $this->validate();
        dd('working');
    }
    public function render()
    {
        return view('livewire.admin.profile');
    }
}
