@extends('admin.layouts.master')
@section('title', 'Vendors List')
@section('page-title','Vendors List')
@section('content')
{{-- ROW-1 OPEN --}}
<div>
    @if ($count > 0)
    <livewire:admin.vendor.read />
    @else
    <div class="card">
        <div class="card-body text-center">
            <img class="fixWidth" src="{{asset('backend/default-images/default_icons/categories.png')}}" alt="">
            <h6 class="mt-4 mb-2 text-capitalize">vendors added</h6>
            <h2 class="h2 mb-2 number-font">0</h2>
            <a href=" {{route('add.vendor')}} " class="text-muted text-capitalize">add new vendor</a>
        </div>
    </div>
    @endif

    {{-- Start Edit Category --}}
    <livewire:admin.vendor.edit>
        {{-- End Edit Category --}}

        {{-- Start Delete Category --}}
        <livewire:admin.vendor.delete>
            {{-- End Delete Category --}}
</div>
{{-- ROW-1 CLOSED --}}
@endsection
