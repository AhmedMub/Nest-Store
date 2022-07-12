<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;
    //Sorting
    public $sortBy = 'title_en';
    public $sortDirection = 'desc';
    public $field = 'title_en';
    public $perPage = 5;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    //Bulk Delete
    //this is an empty array property will be bind to all checkboxes it will grab all selected values ids
    public $selectedCheckboxes = [];

    //select all method below
    public $selectAll = false;

    public $bulkDisabled = true;

    protected $listeners = [
        'newSliderAdded' => '$refresh',
        'sliderUpdated' => '$refresh',
        'sliderDeleted' => '$refresh'
    ];

    public function sortBy($field)
    {

        if ($this->sortDirection == 'desc') {

            $this->sortDirection = 'asc';
        } else {

            $this->sortDirection = 'desc';
        }
        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    //bulk delete: this is will be bind with delete button (wire:click.prevent='deleteSelected'), it will grab all ids from selectedCheckboxes array and will deleted, then return empty array as it was, then make sure that selectAll false
    public function deleteSelected()
    {
        //whereIn method will not delete spatie media because delete() method must called on the model itself
        //Slider::query()->whereIn('id', $this->selectedCheckboxes)->delete();
        if (count($this->selectedCheckboxes) > 0) {
            foreach ($this->selectedCheckboxes as $model) {
                Slider::findOrFail($model)->delete();
            }
        }
        $this->selectedCheckboxes = [];
        $this->selectAll = false;

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'Slider Deleted Successfully'
        ]);
    }

    //catch select all property from checkbox input: this will be model bind ( wire:model='selectAll') for checkbox input type, so if user checked 'select All' all checkboxes will be selected accordingly
    public function updatedSelectAll($val)
    {
        if ($val) {
            $this->selectedCheckboxes = Slider::pluck('id');
        } else {
            $this->selectedCheckboxes = [];
        }
    }

    public function render()
    {
        $this->bulkDisabled = count($this->selectedCheckboxes) < 1;

        $sliders = Slider::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.admin.slider.read', compact('sliders'));
    }
}
