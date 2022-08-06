<?php

namespace App\View\Components\Admin\Partials;

use Illuminate\View\Component;

class SpatieImage extends Component
{
    public $title;
    public $forError;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $forError)
    {
        $this->title = $title;
        $this->forError = $forError;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.partials.spatie-image');
    }
}
