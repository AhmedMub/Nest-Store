<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileInfo extends Component
{
    public $user;
    public $userId;
    public $first_name;
    public $second_name;
    public $address;
    public $addressTwo;
    public $phone;
    public $email;

    public function mount()
    {
        $this->user = Auth::user();
        $this->userId = $this->user->id;
        $this->first_name = $this->user->first_name;
        $this->second_name = $this->user->second_name;
        $this->address = $this->user->address;
        $this->addressTwo = $this->user->addressTwo;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
    }
    //form validation
    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:15', 'min:3', 'regex:/^[a-z0-9\s]*$/i'],
            'second_name' => ['required', 'string', 'max:15', 'min:3', 'regex:/^[a-z0-9\s]*$/i'],
            'address' => ['required', 'string', 'max:60', 'min:3', 'regex:/^[a-z0-9\s]*$/i'],
            'addressTwo' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'email' => ['required', 'string', 'email', "unique:users,email,$this->userId"],
            'phone' => ['required', 'regex:/[0-9]{8}/'],
        ];
    }

    protected $messages = [
        'first_name.required' => 'First name field is required',
        'second_name.required' => 'Second name field is required',
    ];

    public function update()
    {
        $this->validate();

        User::whereId($this->user->id)->update([
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'address' => $this->address,
            'addressTwo' => $this->addressTwo,
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
