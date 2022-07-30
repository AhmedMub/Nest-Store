<?php

namespace App\Http\Livewire\Frontend\Index;

use App\Models\Product;
use Livewire\Component;

class PopularProductsSection extends Component
{
    public $getSixCats;
    public $langAr;
    public $user;
    public $getLatestTenProducts;
    public $activeCat = "all";
    public $categoryId;
    public $headerName = "";

    public function mount($getSixCats, $langAr, $user)
    {
        $this->getSixCats = $getSixCats;
        $this->langAr = $langAr;
        $this->user = $user;
    }

    //this is to display products related to chosen category
    public function orderByCategory($catId)
    {
        $this->activeCat = $catId;
        $this->categoryId = $catId;
    }

    //set category id to null to get latest products
    public function getAllProducts()
    {
        $this->activeCat = 'all';
        $this->categoryId = null;
    }

    public function render()
    {
        //if there is category chosen by user the products that related to such category will be displayed
        if (isset($this->categoryId)) {
            $this->getLatestTenProducts = Product::where('product_status', 1)->whereCategoryId($this->categoryId)->take(10)->latest()->get();
        } else {
            //if user choose "All" the categoryId will be null then the latest products below will be displayed
            $this->getLatestTenProducts = Product::where('product_status', 1)->take(10)->latest()->get();
        }

        return view('livewire.frontend.index.popular-products-section', [

            'getLatestTenProducts' => $this->getLatestTenProducts,
        ]);
    }
}
