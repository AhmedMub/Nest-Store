@section('title', 'Category')
@section('page-title','Categories')
{{-- ROW-1 OPEN --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
        <div class="card cart">
            <div class="card-header">
                <h3 class="card-title">Categories List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr class="border-top text-center">
                                <th class="wd-15p border-bottom-0 text-capitalize">category icon</th>
                                <th class="wd-15p border-bottom-0 text-capitalize">category EN</th>
                                <th class="wd-15p border-bottom-0 text-capitalize">Category AR</th>
                                <th class="wd-15p border-bottom-0 text-capitalize">status</th>
                                <th class="wd-15p border-bottom-0 text-capitalize">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    {{-- <div class="text-center">
                                        <img src="../assets/images/pngs/4.jpg" alt="" class="cart-img text-center">
                                    </div> --}}
                                    icon
                                </td>
                                <td>en</td>
                                <td>ar</td>
                                <td>status</td>
                                <td>
                                    <div class=" d-flex justify-content-center g-2">
                                        <a class="btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                            data-bs-toggle="tooltip" data-bs-original-title="Edit"><span
                                                class="bi bi-heart fs-16"></span></a>
                                        <a class="btn text-danger bg-danger-transparent btn-icon py-1"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delete"><span
                                                class="bi bi-trash fs-16"></span></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>
                                    {{-- <div class="text-center">
                                        <img src="../assets/images/pngs/4.jpg" alt="" class="cart-img text-center">
                                    </div> --}}
                                    icon
                                </td>
                                <td>en</td>
                                <td>ar</td>
                                <td>status</td>
                                <td>
                                    <div class=" d-flex justify-content-center g-2">
                                        <a class="btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                            data-bs-toggle="tooltip" data-bs-original-title="Edit"><span
                                                class="bi bi-heart fs-16"></span></a>
                                        <a class="btn text-danger bg-danger-transparent btn-icon py-1"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delete"><span
                                                class="bi bi-trash fs-16"></span></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
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
@push('child-scripts')
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/js/table-data.js')}}"></script>
@endpush
