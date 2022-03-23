<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\SubCategory;
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

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'subCatAdded' => '$refresh',
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

    public function render()
    {
        $subCategories = SubCategory::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.subcategory.read', [

            'subCategories' => $subCategories
        ]);
    }
}
