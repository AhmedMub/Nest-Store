{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">Releated Product to tag "{{$selectedTagName}}"</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body card-body py-2">
                @if ($products->isEmpty())
                <div class="card text-info bg-info-transparent">
                    <div class="card-body">
                        <h4 class="card-title">Tag Name "{{$selectedTagName}}" </h4>
                        <p class="card-text">There are no records found for selected tag</p>
                    </div>
                </div>
                @else
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
                                <th class="wd-15p border-bottom-0 text-capitalize">sku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="text-center">
                                <td> {{$product->name_en}} </td>
                                <td> {{$product->name_ar}} </td>
                                <td>{{$product->sku}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <p>
                            {{-- NOTE when you use pagination you will have access to all below methods --}}
                            showing {{$products->firstItem()}} to {{$products->lastItem()}} out of
                            {{$products->total()}}

                        </p>
                        <p>
                            {{-- this is to declare the pagenation --}}
                            {{$products->links()}}
                        </p>
                    </div>
                </div>
                @endif

                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
                </div>
            </div>
        </div>
    </div>
</div>
