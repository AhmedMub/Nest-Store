<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\SubCategory;
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

    //Bulk Delete
    //this is an empty array property will be bind to all checkboxes it will grab all selected values ids
    public $selectedSubCats = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'subCatAdded' => '$refresh',
        'subCatUpdated' => '$refresh',
        'subCatDeleted' => '$refresh',
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
        SubCategory::query()->whereIn('id', $this->selectedSubCats)->delete();
        $this->selectedSubCats = [];
        $this->selectAll = false;
    }

    //catch select all property from checkbox input: this will will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked will check all the selected box accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedSubCats = SubCategory::pluck('id');
        } else {
            $this->selectedSubCats = [];
        }
    }

    public function render()
    {
        //NOTE this $bulkDisabled by default is true, and it's job to detect if $selectedSubCats array values are < 1 which means it has at least one value in order to be false so if its false disabled will be removed class="@if($bulkDisabled) disabled @endif
        $this->bulkDisabled = count($this->selectedSubCats) < 1;

        $subCategories = SubCategory::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.subcategory.read', [

            'subCategories' => $subCategories
        ]);
    }
}
