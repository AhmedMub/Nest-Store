<?php

namespace App\View\Components\Frontend\Essentials;

use Illuminate\View\Component;

class Prelaoder extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.essentials.prelaoder');
    }
}
