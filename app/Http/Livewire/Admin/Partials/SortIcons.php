<?php

namespace App\Http\Livewire\Admin\Partials;

use Livewire\Component;
use Ramsey\Uuid\Guid\Fields;

class SortIcons extends Component
{
    public $sortBy;
    public $field;
    public $sortDirection;

    protected $listeners = ['testing' => 'changed'];

    public function mount($sortBy, $field, $sortDirection)
    {
        $this->sortBy = $sortBy;
        $this->field = $field;
        $this->sortDirection = $sortDirection;
    }

    public function changed($sortBy, $sortDirection)
    {
        $this->sortBy = $sortBy;
        $this->sortDirection = $sortDirection;
    }

    public function render()
    {
        return view('livewire.admin.partials.sort-icons');
    }
}
