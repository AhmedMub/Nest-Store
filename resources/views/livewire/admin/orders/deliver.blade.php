<div class="card">
    <div class="card-header">
        <h3 class="card-title text-capitalize">Delivered orders List</h3>
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
                        <th wire:click="sortBy('created_at')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">
                            date
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th wire:click="sortBy('invoice_no')"
                            class="cursor-pointer wd-15p border-bottom-0 text-capitalize">
                            inovice number
                            {{-- change Icone --}}
                            @if ($sortBy !== $field)
                            <i class="bi bi-arrow-down"></i>
                            @elseif($sortDirection == 'asc')
                            <i class="bi bi-arrow-up"></i>
                            @else
                            <i class="bi bi-arrow-down"></i>
                            @endif
                        </th>
                        <th class="wd-15p border-bottom-0 text-capitalize">customer name</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">customer email</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">amount</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">payment</th>
                        <th class="wd-15p border-bottom-0 text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="text-center">
                        <td> {{$order->created_at->format('d-m-Y')}} </td>
                        <td>{{$order->invoice_no}}</td>
                        <td>{{$order->userOrders->getFullName()}}</td>
                        <td>{{$order->userOrders->email}}</td>
                        <td>${{$order->amount}}</td>
                        <td>
                            @if ($order->payment_method == 0)
                            <span class="badge bg-info fs-6">Cash on delivery</span>
                            @else
                            online
                            @endif
                        </td>
                        <td>
                            <div class=" d-flex justify-content-center g-2">
                                <a href="{{route('orders.show.invoice', $order->invoice_no)}}" target="_blank"
                                    class="btn text-success bg-info-transparent btn-icon py-1 me-2"><span
                                        class="bi bi-receipt fs-16"></span></a>
                                <a wire:click="$emitTo('admin.orders.show-order-items','showOrderItems',{{$order->id}})"
                                    class="modal-effect btn text-secondary bg-secondary-transparent btn-icon py-1 me-2"
                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                    data-bs-original-title="showItems" href="#extralargemodal">
                                    <span class="bi bi-eye-fill fs-16"></span>
                                </a>
                                <a wire:click="deleteItem({{$order->id}})"
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
                    showing {{$orders->firstItem()}} to {{$orders->lastItem()}} out of
                    {{$orders->total()}}
                </p>
                <p>
                    {{-- this is to declare the pagenation --}}
                    {{$orders->links()}}
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
                Livewire.emit('deletedDelivered', event.detail.id);
            }
        });
    });
</script>
@endpush
