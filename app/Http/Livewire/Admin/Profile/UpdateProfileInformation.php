<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UpdateProfileInformation extends Component
{
    public $admin,
        $first_name,
        $second_name,
        $email,
        $phone_number;

    public function mount($admin)
    {
        $this->first_name   = $admin->first_name;
        $this->second_name  = $admin->second_name;
        $this->email        = $admin->email;
        $this->phone_number = $admin->phone_number;
    }


    //form validation
    protected $rules = [
        'first_name' => ['required'],
        'second_name' => ['required'],
        'email' => ['required'],
        'phone_number' => ['required'],
    ];

    public function update()
    {
        $this->validate();
        Admin::whereId($this->admin->id)->update([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ]);
        $this->emit('profileInfoUpdated');
    }
    public function render()
    {
        return view('livewire.admin.profile.update-profile-information');
    }
}
