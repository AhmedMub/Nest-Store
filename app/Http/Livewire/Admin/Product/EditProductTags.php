<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Spatie\Tags\Tag;

class EditProductTags extends Component
{
    //tags
    //this is will be updated foreach tag search if user choose a tag should be added
    public $addedTags;

    //NOTE:search function: any given input will immediately stored in $queryTag after 300ms, then search method will start search for the given input using updatedQueryTag() method, and will store database results in $getTags array;
    public $queryTag = '';
    public $getTags = [];
    public $productId;
    public $savedTags;

    protected $listeners = [
        'editProductTags',
    ];

    public function mount()
    {
        $this->addedTags = new Collection();
    }

    public function editProductTags($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $id;
        $this->savedTags = $product->tags()->get();
    }

    public function detachTag($id)
    {
        $tag = Tag::findOrFail($id);
        $product = Product::findOrFail($this->productId);
        $product->detachTag($tag->name);
        redirect()->route('product.manage');
        $this->messageSuccess("Tag Detached Successfully");
    }

    //search for Tags;
    public function updatedQueryTag()
    {
        $this->getTags = Tag::search($this->queryTag)->get();
    }

    //add tags to the collection
    public function addTagToCol($id)
    {
        $foundedTag = Tag::findOrFail($id);

        //to prevent user from adding duplicate tags in the collection
        (!$this->addedTags->contains('name', $foundedTag->name)) ? $this->addedTags->push($foundedTag) : "";
    }
    //remove tag from collection
    public function removeFromCol($id)
    {
        $foundedTag = Tag::findOrFail($id);

        //find the collection key that will be removed from the collection
        $key = $this->addedTags->search($foundedTag);

        //remove from the collection the correspondence item
        $this->addedTags->forget($key);
    }

    public function update()
    {
        $product = Product::findOrFail($this->productId);
        $selectedTags = [];
        if (count($this->addedTags) > 0) {
            foreach ($this->addedTags as $tag) {
                $selectedTags[] = $tag->name;
            }
        }
        $product->attachTags($selectedTags);

        $this->messageSuccess("Tag Attached Successfully");
    }

    public function messageSuccess($custom)
    {
        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => $custom
        ]);
    }

    public function render()
    {
        $tags = Tag::latest()->get();

        return view('livewire.admin.product.edit-product-tags', compact(
            'tags',
        ));
    }
}
