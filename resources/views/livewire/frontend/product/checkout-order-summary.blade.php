<table class="table no-border">
    <tbody>
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Subtotal</h6>
            </td>
            <td class="cart_total_amount">
                <h4 class="text-brand text-end">$subtotal</h4>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="2">
                <div class="divider-2 mt-10 mb-10"></div>
            </td>
        </tr>
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Shipping fees: <strong class="text-brand">5%</strong>
                </h6>
            </td>
            <td class="cart_total_amount">
                <h5 class="text-heading text-end">$shippingFees</h5>
            </td>
        </tr>
        <tr>
            <td class="cart_total_label">
                <h6 class="text-muted">Estimate for</h6>
            </td>
            <td class="cart_total_amount">
                <h4 class="text-heading text-end">
                    {{-- /if user auth and address not null --}}
                    {{-- @if (Auth::check() && isset(Auth::user()->address))
                    {{Auth::user()->address}}
                    @else
                    Address not set
                    @endif --}}
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
            <td class="cart_total_amount">
                <h4 class="text-brand text-end">$</h4>
            </td>
        </tr>
    </tbody>
</table>
