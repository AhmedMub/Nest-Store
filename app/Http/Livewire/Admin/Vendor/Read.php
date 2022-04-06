<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Carbon\Carbon;
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
        'categoryUpdated' => '$refresh',
        'catDeleted' => '$refresh'
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
        $vendors = Vendor::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);


        return view('livewire.admin.vendor.read', [

            'vendors' => $vendors,
        ]);
    }
}
