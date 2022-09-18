<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditAdmin extends Component
{
    public $fname;
    public $sname;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $role;
    public $roles;
    public $adminId;

    protected function rules()
    {
        return [
            'fname' => ['required', 'max:20', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'sname' => ['required', 'max:20', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'role' => ['nullable', 'string'],
            'email' => ['required', 'email', 'string', "unique:admins,email,$this->adminId"],
            'phone' => ['required', 'integer', 'regex:/^[0-9\s]*$/i'],
            'password' => ['nullable', 'string', 'regex:/^[a-z0-9\s]*$/i'],
            'password_confirmation' => ['nullable', 'same:password'],
        ];
    }

    protected $listeners = [
        'showAdminInfo' => 'showAdmin',
    ];

    public function showAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $this->adminId = $id;
        $this->fname = $admin->first_name;
        $this->sname = $admin->second_name;
        $this->email = $admin->email;
        $this->phone = $admin->phone_number;
    }

    public function update()
    {
        $this->validate();

        $updateAdmin = Admin::findOrFail($this->adminId);

        $updateAdmin->update([
            'first_name' => $this->fname,
            'second_name' => $this->sname,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'password' => bcrypt($this->password)
        ]);

        if (isset($this->role) && !empty($this->role)) {
            $getRole = Role::findOrFail((int)$this->role)->name;
            //All current roles will be removed from the user and replaced by the value given
            $updateAdmin->syncRoles($getRole);
        }

        $this->reset('password', 'password_confirmation');

        $this->emitTo('admin.admins.show-admins-list', 'refresh');

        if ($updateAdmin) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'admin updated successfully'
            ]);
        }
    }

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.admin.admins.edit-admin');
    }
}
