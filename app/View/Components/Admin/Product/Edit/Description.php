<?php

namespace App\View\Components\Admin\Product\Edit;

use Illuminate\View\Component;

class Description extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $longDescEn;
    public $longDescAr;
    public $packagingDeliveryEn;
    public $packagingDeliveryAr;
    public $suggestedUseEn;
    public $suggestedUseAr;
    public $otherIngredientsEn;
    public $otherIngredientsAr;
    public $warningsEn;
    public $warningsAr;

    public function __construct($longDescEn, $longDescAr, $packagingDeliveryEn, $packagingDeliveryAr, $suggestedUseEn, $suggestedUseAr, $otherIngredientsEn, $otherIngredientsAr, $warningsEn, $warningsAr)
    {
        $this->longDescEn = $longDescEn;
        $this->longDescAr = $longDescAr;
        $this->packagingDeliveryEn = $packagingDeliveryEn;
        $this->packagingDeliveryAr = $packagingDeliveryAr;
        $this->suggestedUseEn = $suggestedUseEn;
        $this->suggestedUseAr = $suggestedUseAr;
        $this->otherIngredientsEn = $otherIngredientsEn;
        $this->otherIngredientsAr = $otherIngredientsAr;
        $this->warningsEn = $warningsEn;
        $this->warningsAr = $warningsAr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.edit.description');
    }
}
