<?php

namespace App\View\Components\Admin\Partials;

use Illuminate\View\Component;

class SortIcons extends Component
{
    public $sortBy;
    public $field;
    public $sortDirection;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sortBy, $field, $sortDirection)
    {
        $this->sortBy = $sortBy;
        $this->field = $field;
        $this->sortDirection = $sortDirection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.sort-icons');
    }
}
