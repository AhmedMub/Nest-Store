@section('title', 'Product')
@section('page-title','Product Dates')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product Dates</h3>
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
                                placeholder="Search by name,sku, dates" type="search">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <thead class="table-primary">
                    <tr class="text-center">
                        <th wire:click="sortBy('name_en')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">product english name
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
                        <th class="wd-15p border-bottom-0 text-capitalize">product SKU number</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">MFG date</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">EXP date</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Remaining Days</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dates as $date)
                    <tr class="text-center">
                        <td> {{$date->productDates->name_en}} </td>
                        <td> {{$date->productDates->sku}} </td>
                        <td>
                            @if (!empty($date->mfg))
                            {{$date->mfg}}
                            @else
                            <span class="badge bg-warning-gradient badge-sm fx-5 me-1 mb-1 mt-1">No Date</span>
                            @endif
                        </td>
                        <td>
                            @if (!empty($date->exp))
                            {{$date->exp}}
                            @else
                            <span class="badge bg-warning-gradient badge-sm fx-5 me-1 mb-1 mt-1">No Date</span>
                            @endif
                        </td>
                        <td>
                            @if (!empty($date->mfg) && !empty($date->exp))
                            @if ($date->remainingDays() != 0)
                            <span
                                class="@if($date->remainingDays()<=8)badge bg-danger-gradient fs-6  me-1 mb-1 mt-1 @endif">{{$date->remainingDays()}}</span>
                            @else
                            <span class="badge bg-danger-gradient fs-6  me-1 mb-1 mt-1">Expired</span>
                            @endif
                            @else
                            <span class="badge bg-warning-gradient badge-sm fx-5 me-1 mb-1 mt-1">Not Set</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>
                    {{-- NOTE when you use pagination you will have access to all below methods --}}
                    showing {{$dates->firstItem()}} to {{$dates->lastItem()}} out of {{$dates->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$dates->links()}}
                </p>
            </div>
        </div>
    </div>
</div>
