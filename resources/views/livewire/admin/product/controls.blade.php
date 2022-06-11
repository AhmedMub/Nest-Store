@section('title', 'Product')
@section('page-title','Product Controls')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product Settings</h3>
    </div>
    <div class="card-body">
        <a href=" {{route('product.add')}} " id="table2-new-row-button" class="btn btn-primary mb-4 text-capitalize">
            Add
            New product</a>
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
                                placeholder="Search by name, Category, sku, ..." type="search">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <thead class="table-primary">
                    <tr class="text-center">
                        <th wire:click="sortBy('name_en')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">english name
                            {{-- change Icone --}}
                            {{-- /-//FIXME not working well--}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('name_ar')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">arabic name

                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">main category</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">SKU number</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">status</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">hot deals</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">new deals</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">discount status</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">show description</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">additional info</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">show vendor</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">show reviews</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="text-center">
                        <td> {{$product->name_en}} </td>
                        <td> {{$product->name_ar}} </td>
                        <td> {{$product->productMainCat->name_en}} </td>
                        <td> {{$product->sku}} </td>
                        <td>
                            <livewire:admin.product.status :product="$product" :name="'product_status'"
                                :key="'product_status'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.hot-deals :product="$product" :name="'hot_deals'"
                                :key="'hot_deals'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.new-deals :product="$product" :name="'new_deals'"
                                :key="'new_deals'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.discount-status :product="$product" :name="'discount_status'"
                                :key="'discount_status'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.description-status :product="$product" :name="'desc_status'"
                                :key="'desc_status'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.add-info-status :product="$product" :name="'additionalInfo_status'"
                                :key="'additionalInfo_status'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.vendor-status :product="$product" :name="'vendor_status'"
                                :key="'vendor_status'.$product->id" />
                        </td>
                        <td>
                            <livewire:admin.product.review-status :product="$product" :name="'reviews_status'"
                                :key="'reviews_status'.$product->id" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>
                    {{-- NOTE when you use pagination you will have access to all below methods --}}
                    showing {{$products->firstItem()}} to {{$products->lastItem()}} out of {{$products->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$products->links()}}
                </p>
            </div>
        </div>
    </div>
</div>
