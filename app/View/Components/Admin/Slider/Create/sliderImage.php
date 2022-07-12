<?php

namespace App\View\Components\Admin\Slider\Create;

use Illuminate\View\Component;

class sliderImage extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     * @param  string  $title
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
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
