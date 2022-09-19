@extends('admin.layouts.master')
@section('title', 'Product List')
@section('page-title','Product List')
@section('content')
{{-- ROW-1 OPEN --}}
<div>
    @if ($count > 0)
    <livewire:admin.product.read />
    @else
    <div class="card">
        <div class="card-body text-center">
            <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
            <h6 class="mt-4 mb-2 text-capitalize">products added</h6>
            <h2 class="h2 mb-2 number-font">0</h2>
            <a href=" {{route('product.add')}} " id="table2-new-row-button"
                class="btn btn-primary mb-4 text-capitalize">
                Add
                New product</a>

        </div>
    </div>
    @endif

    <livewire:admin.product.edit>

        {{-- Start edit attached tags --}}
        <livewire:admin.product.edit-product-tags>


            <livewire:admin.product.delete>
</div>
{{-- ROW-1 CLOSED --}}
@endsection
