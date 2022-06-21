<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class Status extends Component
{
    public Tag $tag;
    public string $name;
    public bool $status;

    public function mount()
    {

        $this->status = $this->tag->getAttribute('status');
    }

    public function updating($name, $value)
    {
        $this->tag->setAttribute($name, $value)->save();
    }
    public function render()
    {
        return view('livewire.admin.product.tags.status');
    }
}
