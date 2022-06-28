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
            <img class="fixWidth" src="{{asset('backend/default-images/default_icons/categories.png')}}" alt="">
            <h6 class="mt-4 mb-2 text-capitalize">products added</h6>
            <h2 class="h2 mb-2 number-font">0</h2>
            <a href=" {{route('product.add')}} " id="table2-new-row-button"
                class="btn btn-primary mb-4 text-capitalize">
                Add
                New product</a>

        </div>
    </div>
    @endif

    {{-- Start Edit Category --}}
    <livewire:admin.product.edit>
        {{-- End Edit Category --}}

        {{-- Start Delete Category --}}
        <livewire:admin.product.delete>
            {{-- End Delete Category --}}
</div>
{{-- ROW-1 CLOSED --}}
@endsection
@push('child-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush
@push('child-scripts')
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

<script>
    new Pikaday({
        field: document.getElementById('start_date'),
        format: 'D MMM YYYY',
        });
</script>
@endpush
