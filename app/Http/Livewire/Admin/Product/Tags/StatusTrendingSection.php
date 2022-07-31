<?php

namespace App\Http\Livewire\Admin\Product\Tags;

use Livewire\Component;
use Spatie\Tags\Tag;

class StatusTrendingSection extends Component
{
    public Tag $tag;
    public string $name;
    public bool $status_trending_sec;

    public function mount()
    {

        $this->status_trending_sec = $this->tag->getAttribute('status_trending_sec');
    }

    public function updating($name, $value)
    {
        $this->tag->setAttribute($name, $value)->save();

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Status Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product.tags.status-trending-section');
    }
}
