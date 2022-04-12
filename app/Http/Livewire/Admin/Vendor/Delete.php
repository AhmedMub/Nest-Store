<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{

    public $vendorId;

    protected $listeners = ['deleteVendor'];

    public function deleteVendor($id)
    {
        $this->vendorId = $id;
    }

    public function delete()
    {
        $vendorLogo = Vendor::findOrFail($this->vendorId)->logo;
        //check if logo field not null
        if ($vendorLogo !== null) {
            Storage::delete('public/frontend/vendors/' . $vendorLogo);
        }

        Vendor::whereId($this->vendorId)->delete();

        $this->emit('vendorDeleted');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Vendor Deleted Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.vendor.delete');
    }
}
