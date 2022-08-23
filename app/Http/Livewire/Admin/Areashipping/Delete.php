<?php

namespace App\Http\Livewire\Admin\Areashipping;

use App\Models\AreaShipping;
use Livewire\Component;

class Delete extends Component
{
    public $country;

    protected $listeners = ['delete' => 'deleteSelected'];

    public function deleteSelected($id)
    {
        $this->country = $id;
    }

    public function delete()
    {
        AreaShipping::findOrFail($this->country)->delete();

        $this->emit('shippingAreaDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Area Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.areashipping.delete');
    }
}
