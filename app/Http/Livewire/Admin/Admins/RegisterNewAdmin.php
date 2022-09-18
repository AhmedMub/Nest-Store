<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Mail\SendAdminCredentials;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class RegisterNewAdmin extends Component
{
    public $fname;
    public $sname;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $role;
    public $roles;
    public $sendEmail = false;

    protected $rules = [
        'fname' => ['required', 'max:20', 'string', 'regex:/^[a-z0-9\s]*$/i'],
        'sname' => ['required', 'max:20', 'string', 'regex:/^[a-z0-9\s]*$/i'],
        'role' => ['required', 'string'],
        'email' => ['required', 'email', 'string', 'unique:admins'],
        'phone' => ['required', 'integer', 'regex:/^[0-9\s]*$/i'],
        'password' => ['required', 'string', 'regex:/^[a-z0-9\s]*$/i'],
        'password_confirmation' => ['required', 'same:password'],
    ];

    public function register()
    {
        $this->validate();

        if ($this->sendEmail) {
            $this->mailCredentials([$this->fname, $this->sname, $this->email, $this->phone, $this->password]);
        }

        $newAdmin = Admin::create([
            'first_name' => $this->fname,
            'second_name' => $this->sname,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'password' => bcrypt($this->password)
        ]);

        $this->assignAdminRole($newAdmin->id);

        $this->reset();

        if ($newAdmin) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'New admin created successfully'
            ]);
        }
    }

    public function mailCredentials($credentials)
    {
        Mail::to("$credentials[2]")->send(new SendAdminCredentials($credentials));
    }

    public function assignAdminRole($id)
    {
        $newAdmin = Admin::findOrFail($id);
        $getRole = Role::findOrFail((int)$this->role)->name;
        $newAdmin->assignRole($getRole);
    }
    public function render()
    {
        $this->roles = Role::all();

        return view('livewire.admin.admins.register-new-admin');
    }
}
