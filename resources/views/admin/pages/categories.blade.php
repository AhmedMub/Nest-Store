@extends('admin.layouts.master')
@section('title', 'Category')
@section('page-title','Categories')
@section('content')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        @if ($count > 0)
        <livewire:admin.category.read />
        @else
        <div class="card">
            <div class="card-body text-center">
                <img class="fixWidth" src="{{asset('backend/default-images/default_icons/categories.png')}}" alt="">
                <h6 class="mt-4 mb-2 text-capitalize">categories added</h6>
                <h2 class="h2 mb-2 number-font">0</h2>
                <p class="text-muted text-capitalize">Please add new category <i
                        class="custom-color-addIcons fa-solid fa-circle-arrow-right fa-beat-fade fa-lg"></i>
                </p>
            </div>
        </div>
        @endif
    </div>

    {{-- Start Create Category --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.category.create />
    </div>
    {{-- End Create Category --}}

    {{-- Start Edit Category --}}
    <livewire:admin.category.edit>
        {{-- End Edit Category --}}

        {{-- Start Delete Category --}}
        <livewire:admin.category.delete>
            {{-- End Delete Category --}}

</div>
{{-- ROW-1 CLOSED --}}
@endsection
