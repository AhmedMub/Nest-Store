<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
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
    public $selectedCheckboxes = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    protected $listeners = [
        'newCouponAdded' => '$refresh',
        'couponUpdated' => '$refresh',
        'couponDeleted' => '$refresh',
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

    //bulk delete: this is will be bind with delete button (wire:click.prevent='deleteSelected'), it will grab all ids from selectedCheckboxes array and will deleted, then return empty array as it was, then make sure that selectAll false
    public function deleteSelected()
    {
        if (count($this->selectedCheckboxes) > 0) {
            foreach ($this->selectedCheckboxes as $model) {
                Coupon::findOrFail($model)->delete();
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Coupon Deleted Successfully'
        ]);
    }

    //catch select all property from checkbox input: this will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked 'select All' all checkboxes will be selected accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedCheckboxes = Coupon::pluck('id');
        } else {
            $this->selectedCheckboxes = [];
        }
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        // using Search not going to work: refer to https://github.com/laravel/scout/issues/223
        //$coupons = Coupon::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        $coupons = Coupon::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.coupons.read', compact('coupons'));
    }
}
