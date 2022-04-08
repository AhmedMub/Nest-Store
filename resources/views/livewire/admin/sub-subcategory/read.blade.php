<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sub-Subcategories List</h3>
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
                        <button data-bs-target="#modaldemo5" data-bs-toggle="modal" data-bs-original-title="Delete"
                            type="button"
                            class="@if($bulkDisabled) disabled @endif ms-3 btn btn-danger-light text-capitalize">
                            <span class="bi bi-trash fs-16 me-2"></span>delete
                            selected
                        </button>
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
                        <th class="wd-15p border-bottom-0 text-capitalize">
                            <input wire:model='selectAll' type="checkbox"> select all
                        </th>
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
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">category AR
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif

                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">subcategory</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Main Category</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">status</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subSubCategories as $subcat)
                    <tr class="text-center">
                        <td><input wire:model='selectedSubSubCats' value="{{$subcat->id}}" type="checkbox"></td>
                        <td> {{$subcat->name_en}} </td>
                        <td> {{$subcat->name_ar}} </td>
                        <td> {{$subcat->belongToSubCategory->name_en}} </td>
                        <td> {{$subcat->belongToSubCategory->mainCats->name_en}} </td>
                        <td>
                            <livewire:admin.sub-subcategory.status :subcat="$subcat" :name="'status'"
                                :key="'status'.$subcat->id" />
                        </td>
                        <td>
                            <div class=" d-flex justify-content-center g-2">
                                <a wire:click="$emit('editSubSubcategory',{{$subcat->id}})"
                                    class="modal-effect btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                    data-bs-original-title="Edit" href="#modaldemo8">
                                    <span class="bi bi-pen fs-16"></span>
                                </a>
                                <a wire:click="$emit('deleteSubsubCat',{{$subcat->id}})"
                                    class="btn text-danger bg-danger-transparent btn-icon py-1"
                                    data-bs-target="#modaldemo50" data-bs-toggle="modal"
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
                    showing {{$subSubCategories->firstItem()}} to {{$subSubCategories->lastItem()}} out of
                    {{$subSubCategories->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$subSubCategories->links()}}
                </p>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24">
                            <path fill="#f07f8f"
                                d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z" />
                            <circle cx="12" cy="17" r="1" fill="#e62a45" />
                            <path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z" />
                        </svg></span>
                    <h4 class="h4 mb-0 mt-3">Warning</h4>
                    <div class="card-text alert alert-danger mb-0 my-3" role="alert">
                        <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
                        <span class="alert-inner--text text-uppercase"><strong>be careful!</strong>
                            @if ($selectAll)
                            this action will
                            delete all subcategory with releted records
                            @else
                            this action will
                            delete Selected subcategory with releted records
                            @endif
                        </span>
                    </div>
                    <button wire:click.prevent='deleteSelected' aria-label="Close" class="btn btn-danger pd-x-25"
                        data-bs-dismiss="modal">Continue</button>
                    <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
                </div>
            </div>
        </div>
    </div>

</div>
