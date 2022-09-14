{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="extralargemodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">Order Details</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body card-body py-2 bg-color">
                <div class="row row-sm">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <h5 class="mb-3">customer details</h5>
                                <div class="">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered text-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-capitalize">invoice number</th>
                                                            <td class="text-capitalize">{{$invoice_no}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">subtotal</th>
                                                            <td class="text-capitalize">${{$subtotal}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">shipping_fees</th>
                                                            <td class="text-capitalize">${{$shipping_fees}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">discounted coupon</th>
                                                            <td class="text-capitalize">@if ($discounted_coupon)
                                                                ${{$discounted_coupon}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">amount</th>
                                                            <td class="text-capitalize">${{$amount}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">coupon percentage</th>
                                                            <td class="text-capitalize">
                                                                @if ($coupon_discount_percentage)
                                                                {{$coupon_discount_percentage}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">currency</th>
                                                            <td class="text-capitalize">{{$currency}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">transaction id</th>
                                                            <td class="text-capitalize">
                                                                @if ($transaction_id)
                                                                {{$transaction_id}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">payment method</th>
                                                            <td class="text-capitalize">@if ($payment_method == 0)
                                                                cash
                                                                @else
                                                                online
                                                                @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">transaction id</th>
                                                            <td class="text-capitalize">@if ($transaction_id)
                                                                {{$transaction_id}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <h5 class="mb-3">Customer details</h5>
                                <div class="">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered fixTable">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-capitalize">customer name</th>
                                                            <td class="text-capitalize">{{$fname . " " . $lname}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">customer email</th>
                                                            <td>{{$email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">phone number</th>
                                                            <td>{{$phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">district</th>
                                                            <td class="text-capitalize">{{$district}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">area</th>
                                                            <td class="text-capitalize">{{$area}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">postal code</th>
                                                            <td class="text-capitalize">{{$postal_code}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">address</th>
                                                            <td class="text-capitalize">{{$address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">additional address</th>
                                                            <td class="text-capitalize">@if ($addressTwo)
                                                                {{$addressTwo}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-capitalize">additional information</th>
                                                            <td class="text-capitalize">
                                                                @if ($additional_info)
                                                                {{$additional_info}}
                                                                @else
                                                                <span class="badge bg-warning fs-6">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Items</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table border text-nowrap text-md-nowrap mb-0">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Joan Powell</td>
                                                <td>Associate Developer</td>
                                                <td>$450,870</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Gavin Gibson</td>
                                                <td>Account manager</td>
                                                <td>$230,540</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Julian Kerr</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>$55,300</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Cedric Kelly</td>
                                                <td>Accountant</td>
                                                <td>$234,100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
            </div>
        </div>
    </div>
</div>

@push('child-styles')
<style>
    .bg-color {
        background: #f0f0f5;
    }

    .fixTable {
        table-layout: fixed;
        white-space: normal !important;
    }
</style>
@endpush
