<?php

namespace App\Http\Livewire\Admin\SubSubcategory;

use App\Models\SubSubcategory;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{

    use WithPagination;
    //Sorting
    public $sortBy = 'name_en';
    public $sortDirection = 'desc';
    public $field = 'name_en';
    public $perPage = 5;
    public $search = '';

    //Bulk Delete
    //this is an empty array property will be bind to all checkboxes it will grab all selected values ids
    public $selectedSubSubCats = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'newSubSubcategoryAdded' => '$refresh',
        'subSubCatUpdated' => '$refresh',
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

    //bulk delete: this is will be bind with delete button (wire:click.prevent='deleteSelected'), it will grab all ids from selectedSubSubCats array and will deleted, then return empty array as it was, then make sure that selectAll false
    public function deleteSelected()
    {
        SubCategory::query()->whereIn('id', $this->selectedSubSubCats)->delete();
        $this->selectedSubSubCats = [];
        $this->selectAll = false;
    }

    //catch select all property from checkbox input: this will will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked will check all the selected box accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedSubSubCats = SubSubcategory::pluck('id');
        } else {
            $this->selectedSubSubCats = [];
        }
    }

    public function render()
    {
        //NOTE this $bulkDisabled by default is true, and it's job to detect if $selectedSubSubCats array values are < 1 which means it has at least one value in order to be false so if its false disabled will be removed class="@if($bulkDisabled) disabled @endif
        $this->bulkDisabled = count($this->selectedSubSubCats) < 1;

        $subSubCategories = SubSubcategory::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.sub-subcategory.read', [

            'subSubCategories' => $subSubCategories
        ]);
    }
}
