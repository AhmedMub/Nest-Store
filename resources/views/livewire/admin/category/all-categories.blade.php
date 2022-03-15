@section('title', 'Category')
@section('page-title','Categories')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        <livewire:datatable model="App\Models\Category" />
    </div>

    {{-- Start Create Category --}}
    <div class="col-lg-12 col-xl-4 col-sm-12 col-md-12">
        <livewire:admin.category.crud.create />
    </div>
    {{-- End Create Category --}}

    {{-- Start Edit Category --}}
    <livewire:admin.category.crud.edit>
        {{-- End Edit Category --}}

        {{-- Start Delete Category --}}
        <livewire:admin.category.crud.delete>
            {{-- End Delete Category --}}

</div>
{{-- ROW-1 CLOSED --}}
@push('child-styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

@endpush
@push('child-scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/js/table-data.js')}}"></script>
@endpush
