@extends('admin.layouts.master')
@section('title', 'Manage Slider')
@section('page-title','Edit Slider')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)
        <livewire:admin.slider.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('backend/default-images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">Slider Images Added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">Please slider images <i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    {{-- Start Create Tags --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.slider.create />
    </div>
    {{-- End Create Tags --}}

    {{-- Start Edit Tags --}}
    <livewire:admin.slider.edit>
        {{-- End Edit Tags --}}

        {{-- Start Delete Tags --}}
        <livewire:admin.slider.delete>
            {{-- End Delete Tags --}}

</div>
{{-- ROW-1 CLOSED --}}
@endsection

@push('child-styles')
@once
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endonce
@endpush

@push('child-scripts')
@once
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endonce
@endpush
