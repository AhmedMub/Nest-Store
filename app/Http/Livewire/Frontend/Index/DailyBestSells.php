<?php

namespace App\Http\Livewire\Frontend\Index;

use App\Models\Product;
use Livewire\Component;

class DailyBestSells extends Component
{
    public $getFiveProducts;
    public $user;
    public $langAr;

    public function mount($getFiveProducts, $user, $langAr)
    {
        $this->getFiveProducts = $getFiveProducts;
        $this->user = $user;
        $this->langAr = $langAr;
    }


    public function render()
    {
        return view('livewire.frontend.index.daily-best-sells');
    }
}
