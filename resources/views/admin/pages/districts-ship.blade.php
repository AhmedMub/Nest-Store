@extends('admin.layouts.master')
@section('title', 'Manage Districts Shipping')
@section('page-title','Edit District Shipping')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)
        <livewire:admin.districtship.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">Districts Added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">add new District<i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    {{-- Start Create --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.districtship.create />
    </div>
    {{-- End Create --}}

    {{-- Start Edit --}}
    <livewire:admin.districtship.edit />
    {{-- End Edit --}}

    {{-- Start Delete --}}
    <livewire:admin.districtship.delete />
    {{-- End Delete --}}

</div>
{{-- ROW-1 CLOSED --}}
@endsection
