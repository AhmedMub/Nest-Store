<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Your Orders</h3>
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
                    <tr>
                        <td>#{{$order->invoice_no}}</td>
                        <td>{{$order->created_at->format('d-m-Y')}}</td>
                        <td>
                            @if ($order->status == 0)
                            pending
                            @elseif($order->status == 1)
                            awaiting for shipping
                            @elseif($order->status == 2)
                            completed
                            @elseif($order->status == 3)
                            shipped
                            @elseif($order->status == 4)
                            cancelled
                            @elseif($order->status == 5)
                            declined
                            @else
                            refunded
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
                        <td><a href="{{route('invoice', $order->invoice_no)}}" class="btn-small d-block">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>