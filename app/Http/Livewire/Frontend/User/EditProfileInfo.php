<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileInfo extends Component
{
    public $user;
    public $first_name;
    public $second_name;
    public $address;
    public $phone;
    public $email;

    public function mount()
    {
        $this->user = Auth::user();
        $this->first_name = $this->user->first_name;
        $this->second_name = $this->user->second_name;
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
    }
    //form validation
    protected $rules = [
        'first_name' => ['required', 'string', 'max:15', 'min:3'],
        'second_name' => ['required', 'string', 'max:15', 'min:3'],
        'address' => ['required', 'string', 'max:60', 'min:3'],
        'email' => ['required', 'string', 'email', 'string'],
        'phone' => ['required', 'regex:/[0-9]{8}/'],
        //TODO add security regex
    ];

    protected $messages = [
        'first_name.string' => 'Must Be Characters Only',
        'second_name.string' => 'Must Be Characters Only',
        'phone.regex' => 'Invalid Phone Number',
        //TODO add more messages for above rules

    ];

    public function update()
    {
        $this->validate();
        User::whereId($this->user->id)->update([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->emit('userProfileUpdated');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => 'Account Details Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.user.edit-profile-info');
    }
}