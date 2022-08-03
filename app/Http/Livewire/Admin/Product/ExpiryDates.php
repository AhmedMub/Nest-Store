<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductExpiration;
use Livewire\Component;
use Livewire\WithPagination;

class ExpiryDates extends Component
{
    use WithPagination;

    //Sorting
    //FIXME sortBy
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $field = 'id';
    public $perPage = 5;
    public $search = '';

    protected $paginationTheme = 'bootstrap';


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
        $dates = ProductExpiration::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.product.expiry-dates', [

            'dates' => $dates,
        ])
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
