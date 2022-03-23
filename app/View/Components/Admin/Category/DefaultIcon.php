<?php

namespace App\View\Components\Admin\Category;

use Illuminate\View\Component;

class DefaultIcon extends Component
{
    public $default_icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.category.default-icon');
    }
}
