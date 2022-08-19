@extends('admin.layouts.master')
@section('title', 'Manage Coupons')
@section('page-title','Edit Coupons')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)
        <livewire:admin.coupons.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">coupons Added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">add new coupon<i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    {{-- Start Create Tags --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.coupons.create :carbonDate="$carbonDate" />
    </div>
    {{-- End Create Tags --}}

    {{-- Start Edit Tags --}}
    <livewire:admin.coupons.edit :carbonDate="$carbonDate">
        {{-- End Edit Tags --}}

        {{-- Start Delete Tags --}}
        <livewire:admin.coupons.delete>
            {{-- End Delete Tags --}}

</div>
{{-- ROW-1 CLOSED --}}
@endsection

@push('child-styles')
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush
