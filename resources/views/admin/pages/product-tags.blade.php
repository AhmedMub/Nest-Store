@extends('admin.layouts.master')
@section('title', 'Product')
@section('page-title','Product Tags')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)
        <livewire:admin.product.tags.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">product tags added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">Please add new tag <i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    {{-- Start Create Tags --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.product.tags.create />
    </div>
    {{-- End Create Tags --}}

    {{-- Start Edit Tags --}}
    <livewire:admin.product.tags.edit>
        {{-- End Edit Tags --}}

        {{-- Start releated products--}}
        <livewire:admin.product.tags.related-products>
            {{-- End releated products --}}

            {{-- Start Delete Tags --}}
            <livewire:admin.product.tags.delete>
                {{-- End Delete Tags --}}

</div>
{{-- ROW-1 CLOSED --}}
@endsection
