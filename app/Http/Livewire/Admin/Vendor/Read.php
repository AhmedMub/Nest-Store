<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    //Bulk Delete
    //this is an empty array property will be bind to all checkboxes it will grab all selected values ids
    public $selectedVendors = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    protected $listeners = [
        'vendorUpdated' => '$refresh',
        'vendorDeleted' => '$refresh'
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

    //bulk delete: this is will be bind with delete button (wire:click.prevent='deleteSelected'), it will grab all ids from selectedSubCats array and will deleted, then return empty array as it was, then make sure that selectAll false
    public function deleteSelected()
    {
        Vendor::query()->whereIn('id', $this->selectedVendors)->delete();
        $this->selectedVendors = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Vendor Deleted Successfully'
        ]);
    }

    //catch select all property from checkbox input: this will will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked will check all the selected box accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedVendors = Vendor::pluck('id');
        } else {
            $this->selectedVendors = [];
        }
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedVendors) < 1;

        $vendors = Vendor::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);


        return view('livewire.admin.vendor.read', [

            'vendors' => $vendors,
        ]);
    }
}
