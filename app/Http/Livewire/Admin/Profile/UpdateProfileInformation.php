<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UpdateProfileInformation extends Component
{
    public $admin;
    public  $first_name;
    public $second_name;
    public $email;
    public $phone_number;

    public function mount($admin)
    {
        $this->first_name   = $admin->first_name;
        $this->second_name  = $admin->second_name;
        $this->email        = $admin->email;
        $this->phone_number = $admin->phone_number;
    }


    //form validation
    protected $rules = [
        'first_name' => ['required', 'string', 'max:8', 'min:3'],
        'second_name' => ['required', 'string', 'max:8', 'min:3'],
        'email' => ['required', 'string', 'email', 'string'],
        'phone_number' => ['required', 'integer'],
        //TODO add security regex
    ];

    protected $messages = [
        'first_name.string' => 'Must Be Characters Only',
        'second_name.string' => 'Must Be Characters Only',
        'email.email' => 'Must Be Valid Email Address',
        'phone_number.integer' => 'Must Be Integers Only',
        //TODO add more messages for above rules

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

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Profile Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.profile.update-profile-information');
    }
}
