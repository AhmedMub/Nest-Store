<div class="card">
    <div class="card-header">
        <h3 class="card-title text-capitalize">List Of Admins</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                <div class="row justify-content-between m-0">
                    <div class="col-sm-12 col-md-5">
                        <div class="btn-group mt-2 mb-2">
                            <span class="text-nowrap m-auto">Per Page:&nbsp;</span>
                            <select wire:model='perPage' name="perPage" class="form-control form-select">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 align-self-center">
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input wire:model.debounce.300ms='search' class="form-control w-100"
                                placeholder="Search for orders" type="search">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <thead class="table-primary">
                    <tr class="text-center">
                        <th wire:click="sortBy('first_name')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">
                            name
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">email</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Admin role</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">phone No</th>
                        <th wire:click="sortBy('created_at')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">
                            created at
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('updated_at')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">
                            updated at
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr class="text-center">
                        <td class="text-capitalize">{{$admin->getFullName()}}</td>
                        <td>{{$admin->email}}</td>
                        <td>
                            @if ($admin->roles[0]['name'] == 'super-admin')
                            <span class="text-capitalize badge bg-danger fs-6">{{$admin->roles[0]['name']}}</span>
                            @elseif ($admin->roles[0]['name'] == 'administrator')
                            <span class="text-capitalize badge bg-success fs-6">{{$admin->roles[0]['name']}}</span>
                            @elseif ($admin->roles[0]['name'] == 'author')
                            <span class="text-capitalize badge bg-warning fs-6">{{$admin->roles[0]['name']}}</span>
                            @endif
                        </td>
                        <td>{{$admin->phone_number}}</td>
                        <td>{{$admin->created_at->diffForHumans();}}</td>
                        <td>{{$admin->updated_at->diffForHumans();}}</td>
                        <td>
                            <div class=" d-flex justify-content-center g-2">
                                <a wire:click="$emitTo('admin.admins.edit-admin','showAdminInfo',{{$admin->id}})"
                                    class="modal-effect btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                    data-bs-original-title="showItems" href="#largemodal">
                                    <span class="bi bi-pen fs-16"></span>
                                </a>
                                <a wire:click="removeAdmin({{$admin->id}})"
                                    class="btn text-danger bg-danger-transparent btn-icon py-1"><span
                                        class="bi bi-trash fs-16"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>
                    {{-- -//NOTE when you use pagination you will have access to all below methods --}}
                    showing {{$admins->firstItem()}} to {{$admins->lastItem()}} out of
                    {{$admins->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$admins->links()}}
                </p>
            </div>
        </div>
    </div>
</div>
@push('child-scripts')
<script>
    window.addEventListener('swal:confirmDelete', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true
        }).then((confirmed)=> {
            if(confirmed) {
                Livewire.emit('deletedConfirmed', event.detail.id);
            }
        });
    });
</script>
@endpush
