<?php

namespace App\View\Components\Admin\Slider\Create;

use Illuminate\View\Component;

class sliderImage extends Component
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
        return view('components.admin.slider.create.slider-image');
    }
}
