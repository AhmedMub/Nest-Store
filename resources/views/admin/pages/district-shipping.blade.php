@extends('admin.layouts.master')
@section('title', 'Manage Shipping Districts')
@section('page-title','Edit Shipping District')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)

        <livewire:admin.shippingdistrict.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">Shipping district Added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">add new district<i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.shippingdistrict.create />
    </div>


    <livewire:admin.shippingdistrict.edit />

    <livewire:admin.shippingdistrict.delete />

</div>
{{-- ROW-1 CLOSED --}}
@endsection

@push('child-styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('child-scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endpush
