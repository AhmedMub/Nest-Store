<table class="table no-border">
    <tbody>
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Subtotal</h6>
            </td>
            <td class="cart_total_amount">
                <h4 class="text-brand text-end">${{$subtotal}}</h4>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="2">
                <div class="divider-2 mt-10 mb-10"></div>
            </td>
        </tr>
        <tr>
            <td class="cart_total_label">
                {{-- / 0.1 * 100 = 10% --}}
                <h6 class="text-muted">Shipping fees: <strong class="text-brand">{{$fees*100}}%</strong>
                </h6>
            </td>
            <td class="cart_total_amount">
                <h5 class="text-heading text-end">${{$shippingFees}}</h5>
            </td>
        </tr>
        @if (Session::has('coupon'))
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted text-danger">Coupon Discount: <strong
                        class="text-brand text-danger">{{Session::get('coupon')['couponDiscount'][0]}}%</strong>
                </h6>
            </td>
            <td class="cart_total_amount">
                <h5 class="text-heading text-end text-danger">(${{Session::get('coupon')['amountDiscounted'][0]}})</h5>
            </td>
        </tr>
        @endif
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Estimate for</h6>
            </td>
            <td class="cart_total_amount">
                <h4 class="text-heading text-end">
                    {{-- /if user auth and address not null --}}
                    @if (Auth::check() && isset(Auth::user()->address))
                    {{Auth::user()->address}}
                    @else
                    Address not set
                    @endif
                </h4>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="2">
                <div class="divider-2 mt-10 mb-10"></div>
            </td>
        </tr>
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Total</h6>
            </td>
            <td class="cart_total_amount text-end">
                <h4 class="text-brand text-end d-inline-block">
                    @if (Session::has('coupon'))
                    ${{Session::get('coupon')['totalDiscounted'][0]}}
                    @else
                    ${{$total}}
                    @endif
                </h4>
                @if (Session::has('coupon'))
                <h4 class="text-end  font-md ml-15 custom-old-price">
                    ${{Session::get('coupon')['totalWithoutDiscount'][0]}}</h4>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@push('added-head')
<style>
    .custom-old-price {
        text-decoration: line-through;
        font-size: 20px;
        font-weight: 700;
        color: #B6B6B6 !important;
        display: inline-block;
    }
</style>
@endpush
