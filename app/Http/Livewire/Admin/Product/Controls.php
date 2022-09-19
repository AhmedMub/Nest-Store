<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Controls extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'name_en';
    public $sortDirection = 'desc';
    public $field = 'name_en';
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

        $admin = Auth::guard('admin')->user();
        if ($admin->hasRole('author')) {
            $products = Product::query()->where('createdBy_adminID', $admin->id)->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        } else {
            $products = Product::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        }
        return view('livewire.admin.product.controls', [
            'products' => $products,
        ])
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
