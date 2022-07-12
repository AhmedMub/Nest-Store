<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    /*
    to read spatie images
            @foreach($model->getMedia('gallery') as $image)
            <img src="{{asset($image->getUrl('my-gallery-conversion'))}}">
            @endforeach
    */
    //Sorting
    public $sortBy = 'name_en';
    public $sortDirection = 'desc';
    public $field = 'name_en';
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
        'productUpdated' => '$refresh',
        'productDeleted' => '$refresh'
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
        //Product::query()->whereIn('id', $this->selectedCheckboxes)->delete();
        if (count($this->selectedCheckboxes) > 0) {
            foreach ($this->selectedCheckboxes as $model) {
                Product::findOrFail($model)->delete();
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Products Deleted Successfully'
        ]);
    }

    //catch select all property from checkbox input: this will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked 'select All' all checkboxes will be selected accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedCheckboxes = Product::pluck('id');
        } else {
            $this->selectedCheckboxes = [];
        }
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        $products = Product::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);


        return view('livewire.admin.product.read', [

            'products' => $products,
        ]);
    }
}
