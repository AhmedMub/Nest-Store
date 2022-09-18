<?php

namespace App\Http\Livewire\Admin\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAdminsList extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deletedConfirmed' => 'delete',
        'refresh' => '$refresh'
    ];

    public function sortBy($field)
    {
        if ($this->sortDirection == 'desc') {

            $this->sortDirection = 'asc';
        } else {

            $this->sortDirection = 'desc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function removeAdmin($id)
    {
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'type' => 'warning',
            'title' => 'Are you sure want to remove this Admin?',
            'text' => 'You won\'t be able to revert this!',
            'id' => $id,
        ]);
    }
    public function delete($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->removeRole($admin->roles[0]['name']);

        $admin->delete();

        if ($admin) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Admin Removed successfully!',
                'text' => '',
            ]);
        }
    }

    public function render()
    {
        $admins = Admin::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.admins.show-admins-list', compact('admins'));
    }
}
