{{-- <div class="card">
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
                    @foreach ($categories as $category)
                    <tr class="text-center">
                        <td>
                            @if ($category->icon)
                            <div class="text-center">
                                <img src="{{asset('storage/frontend/categories/'.$category->icon)}}" alt="icon"
                                    class="cart-img text-center">
                            </div>
                            @endif
                        </td>
                        <td> {{$category->name_en}} </td>
                        <td> {{$category->name_ar}} </td>
                        <td>
                            <livewire:admin.category.status :category="$category" :name="'status'"
                                :key="'status'.$category->id" />
                        </td>
                        <td>
                            <div class=" d-flex justify-content-center g-2">
                                <a class="btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                    data-bs-toggle="tooltip" data-bs-original-title="Edit"><span
                                        class="bi bi-pen fs-16"></span></a>
                                <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip"
                                    data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div> --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories List</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                <div class="row justify-content-between m-0">
                    <div class="col-sm-12 col-md-4">
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
                                placeholder="Search for Categories..." type="search">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <thead class="table-primary">
                    <tr class="text-center">
                        <th class="wd-15p border-bottom-0 text-capitalize">default icon</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">category icon</th>
                        <th wire:click="sortBy('name_en')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">category EN
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('name_ar')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">category AR <i
                                class="bi bi-arrow-down"></i> <i class="bi bi-arrow-up"></i>

                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">status</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">default icon status</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="text-center">
                        <input type="hidden">
                        <td>
                            @if ($category->default_icon)
                            <div class="text-center">
                                <img src="{{asset('backend/default-images/'.$category->default_icon)}}" alt="icon"
                                    class="cart-img text-center">
                            </div>
                            @else
                            <span class="badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1">Not Set</span>
                            @endif
                        </td>
                        <td>
                            @if ($category->icon)
                            <div class="text-center">
                                <img src="{{asset('storage/frontend/categories/'.$category->icon)}}" alt="icon"
                                    class="cart-img text-center">
                            </div>
                            @else
                            <span class="badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1">Not Set</span>
                            @endif
                        </td>
                        <td> {{$category->name_en}} </td>
                        <td> {{$category->name_ar}} </td>
                        <td>
                            <livewire:admin.category.crud.status :category="$category" :name="'status'"
                                :key="'status'.$category->id" />
                        </td>
                        <td>
                            <livewire:admin.category.crud.category-default-icon :category="$category"
                                :name="'default_icon_status'" :key="'default_icon_status'.$category->id" />
                        </td>
                        <td>
                            <div class=" d-flex justify-content-center g-2">
                                <a wire:click="$emit('editCategory',{{$category->id}})"
                                    class="modal-effect btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                    data-bs-original-title="Edit" href="#modaldemo8">
                                    <span class="bi bi-pen fs-16"></span>
                                </a>
                                <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip"
                                    data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>
                    {{-- //NOTE when you use pagination you will have access to all below methods --}}
                    showing {{$categories->firstItem()}} to {{$categories->lastItem()}} out of {{$categories->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$categories->links()}}
                </p>
            </div>
        </div>
    </div>
</div>
