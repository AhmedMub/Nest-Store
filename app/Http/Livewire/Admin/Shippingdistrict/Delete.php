<?php

namespace App\Http\Livewire\Admin\Shippingdistrict;

use App\Models\ShippingDistrict;
use Livewire\Component;

class Delete extends Component
{
    public $district;

    protected $listeners = ['delete' => 'deleteSelected'];

    public function deleteSelected($id)
    {
        $this->district = $id;
    }

    public function delete()
    {
        ShippingDistrict::findOrFail($this->district)->delete();

        $this->emit('districtDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'District Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.shippingdistrict.delete');
    }
}
