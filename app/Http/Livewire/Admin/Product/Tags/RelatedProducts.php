<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class RelatedProducts extends Component
{
    use WithPagination;

    protected $listeners = [
        'showPr' => 'productsTag'
    ];
    //Sorting
    public $sortBy = 'name_en';
    public $sortDirection = 'desc';
    public $field = 'name_en';
    public $perPage = 5;

    public $selectedTagName;
    public $relatedProduct;
    protected $paginationTheme = 'bootstrap';




    public function productsTag($id)
    {
        $tag = Tag::findOrFail($id);
        $this->selectedTagName = $tag->name;
    }

    public function sortBy($field)
    {

        if ($this->sortDirection == 'desc') {

            $this->sortDirection = 'asc';
        } else {

            $this->sortDirection = 'desc';
        }
        return $this->sortBy = $field;
    }


    public function render()
    {
        $products = Product::withAnyTagsOfAnyType($this->selectedTagName)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.product.tags.related-products', [

            'products' => $products,
        ]);
    }
}
