<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name_en, $name_ar, $logo, $address, $phone, $description_en, $description_ar, $facebook, $instagram, $twitter, $start_date;


    protected $rules = [
        'name_en' => ['required', 'string', 'unique:categories', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'name_ar' => ['required', 'string', 'unique:categories', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'logo' => ['required', 'image', 'max:10000'],
        'address' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'phone' => ['required', 'integer'],
        'description_en' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'description_ar' => ['required', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'twitter' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'instagram' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'facebook' => ['nullable', 'string', 'regex:/^[^<>()*?=%_${}#:;@![\]{}\/]+$/i'],
        'start_date' => ['required', 'date_format:Y-m-d'],
    ];

    protected $messages = [
        'name_en.required' => 'The English Name field is required',
        'name_ar.required' => 'The English Name field is required',
        'address.required' => 'The Address field is required',
        'logo.required' => 'The Logo field is required',
        'phone.required' => 'The Phone field is required',
        'description_en.required' => 'The English Description field is required',
        'description_ar.required' => 'The Arabic Description field is required',
        'start_date.required' => 'The Start Date field is required',
    ];

    //Create Category
    public function create()
    {
        if (!isset($this->logo)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Image did not upload successfully',
            ]);
            return null;
        }

        $validate = $this->validate();

        $vendor = Vendor::create($validate);
        //to add the Image
        $vendor->addMedia($this->logo->getRealPath())
            ->withResponsiveImages()
            ->toMediaCollection('vendorLogo');

        $this->reset();

        $this->dispatchBrowserEvent('ResetImage');

        $this->dispatchBrowserEvent('alert', [
            'type'      => 'success',
            'message'   => 'New Vendor Created Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.create')
            ->extends('admin.layouts.master')
            ->section('content');
    }
}
