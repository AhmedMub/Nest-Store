<?php

namespace App\View\Components\Frontend\Products;

use Illuminate\View\Component;

class OrderStatus extends Component
{
    public $message;
    public $messageBody;
    public $image;
    public $invoice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $messageBody, $image, $invoice)
    {
        $this->message = $message;
        $this->messageBody = $messageBody;
        $this->image = $image;
        $this->invoice = $invoice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.products.order-status');
    }
}
