<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Your Orders </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr @if ($order->cancel_request == 1)
                        style="color:red;"
                        @endif >
                        <td>#{{$order->invoice_no}}</td>
                        <td>{{$order->created_at->format('d-m-Y')}}</td>
                        <td>
                            @if ($order->status == 0 && $order->cancel_request == 0)
                            Pending
                            @elseif($order->status == 1 && $order->cancel_request == 0)
                            Order has been confirmed
                            @elseif($order->status == 2 && $order->cancel_request == 0)
                            Processing
                            @elseif($order->status == 3 && $order->cancel_request == 0)
                            Shipped
                            @elseif($order->status == 4 && $order->cancel_request == 0)
                            Delivered
                            @elseif ($order->cancel_request == 1)
                            Cancelation requested!
                            @endif
                        </td>
                        <td>
                            @if ($order->discounted_coupon)
                            ${{$order->amount - $order->discounted_coupon}}
                            @else
                            ${{$order->amount}}
                            @endif
                            for {{$order->orderItems->count();}} item
                        </td>
                        <td>
                            @if ($order->cancel_request == 0)
                            <a wire:click="$emitTo('frontend.profile.delete-order', 'cancelMyOrder', {{$order->id}})"
                                data-bs-toggle="modal" data-bs-target="#cancelRequest" href="javascript:void(0)"
                                class="btn-small d-inline">Delete</a>
                            <span style="color:#3BB77E;"> | </span>
                            @endif
                            <a href="{{route('invoice', $order->invoice_no)}}" class="btn-small">View</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <livewire:frontend.profile.delete-order />
</div>
