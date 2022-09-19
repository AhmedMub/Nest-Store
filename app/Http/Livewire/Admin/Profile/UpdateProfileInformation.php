<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UpdateProfileInformation extends Component
{
    public $adminId;
    public $first_name;
    public $second_name;
    public $email;
    public $phone_number;

    public function mount()
    {
        $admin = Auth::guard('admin')->user();
        $this->adminId = $admin->id;
        $this->first_name   = $admin->first_name;
        $this->second_name  = $admin->second_name;
        $this->email        = $admin->email;
        $this->phone_number = $admin->phone_number;
    }


    //form validation
    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:15', 'min:3', 'regex:/^[a-z0-9\s]*$/i'],
            'second_name' => ['required', 'string', 'max:15', 'min:3', 'regex:/^[a-z0-9\s]*$/i'],
            'email' => ['required', 'string', 'email', "unique:admins,email,$this->adminId"],
            'phone_number' => ['required', 'integer'],
        ];
    }

    protected $messages = [
        'first_name.required' => 'The First Name field is required',
        'second_name.required' => 'The Second Name field is required',
        'email.required' => 'The email field is required',
        'phone_number.required' => 'The phone number field is required',
    ];

    public function update()
    {
        $this->validate();

        Admin::findOrFail($this->adminId)->update([
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
