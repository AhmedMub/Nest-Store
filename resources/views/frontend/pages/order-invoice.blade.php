<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Order Invoice</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css?v=4.0')}}" />
</head>

<body>
    <div class="invoice invoice-content invoice-5">
        <div class="back-top-home hover-up mt-30 ml-30">
            <a class="hover-up" href="{{route('home')}}"><i class="fi-rs-home mr-5"></i> Homepage</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="logo d-flex align-items-center">
                                            <a href="index.html" class="mr-20"><img
                                                    src="{{asset('frontend/assets/imgs/theme/favicon.svg')}}"
                                                    alt="logo" /></a>
                                            <div class="text">
                                                <strong class="text-brand">NestMart Inc</strong> <br />
                                                205 North, Suite 810, Chicago, USA
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h2>INVOICE</h2>
                                        <h6>ID Number: <span class="text-brand">{{$order->invoice_no}}</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-banner">
                                <img src="{{asset('frontend/assets/imgs/invoice/banner.png')}}" alt="">
                            </div>

                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item Item</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$item->orderProduct->name_en}}</span>
                                                        <small>SKU: {{$item->orderProduct->sku}}</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">${{$item->price}}</td>
                                                <td class="text-center">{{$item->qty}}</td>
                                                <td class="text-right">${{sprintf("%.2f",$item->qty * $item->price)}}
                                                </td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                <td class="text-right">{{$order->subtotal}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Shipping Fees</td>
                                                <td class="text-right">${{$order->shipping_fees}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Coupon Discount</td>
                                                <td class="text-right">
                                                    @if ($order->discounted_coupon)
                                                    (${{$order->discounted_coupon}})
                                                    @else
                                                    $0.00
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                <td class="text-right f-w-600">
                                                    @if ($order->discounted_coupon)
                                                    ${{$order->amount - $order->discounted_coupon}}
                                                    @else
                                                    ${{$order->amount}}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom pb-80">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-15">Invoice Additional Information</h6>
                                        <p class="font-sm">
                                            <strong>Issue date:</strong> {{$order->created_at->format('d/m/Y')}}<br />
                                            <strong>Invoice To:</strong>
                                            <span class="text-capitalize">{{auth()->user()->getFullName()}}</span><br />
                                            <strong>Payment Method:</strong> @if ($order->payment_method == 0)
                                            Cash
                                            @else
                                            Online
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 class="mb-15">Total Amount</h6>
                                        <h3 class="mt-0 mb-0 text-brand">
                                            @if ($order->discounted_coupon)
                                            ${{$order->amount - $order->discounted_coupon}}
                                            @else
                                            ${{$order->amount}}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="hr mt-30 mb-30"></div>
                                    <p class="mb-0 text-muted"><strong>Note:</strong>This is computer generated receipt
                                        and
                                        does not require physical signature.</p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img
                                    src="{{asset('frontend/assets/imgs/theme/icons/icon-print.svg')}}" alt="" /> Print
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img
                                    src="{{asset('frontend/assets/imgs/theme/icons/icon-download.svg')}}" alt="" />
                                Download </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vendor JS --}}
    <script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    {{-- Invoice JS --}}
    <script src="{{asset('frontend/js/invoice/jspdf.min.js')}}"></script>
    <script src="{{asset('frontend/js/invoice/invoice.js')}}"></script>
</body>

</html>
