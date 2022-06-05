@extends('admin.layouts.master')
@section('title', 'Product List')
@section('page-title','Product List')
@section('content')
{{-- ROW-1 OPEN --}}
<div>
    @if ($count > 0)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product List</h3>
        </div>
        <div class="card-body">
            <livewire:admin.product.read />
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-body text-center">
            <img class="fixWidth" src="{{asset('backend/default-images/default_icons/categories.png')}}" alt="">
            <h6 class="mt-4 mb-2 text-capitalize">products added</h6>
            <h2 class="h2 mb-2 number-font">0</h2>
            <a href=" {{route('product.add')}} " class="text-muted text-capitalize">add new product</a>
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
<style>
    [x-cloak] {
        display: none !important;
    }
</style>
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
<script>
    //center element th product table list
    // $(function() {
    //     $('thead tr th div').addClass('justify-content-center')
    // })
</script>
@endpush
