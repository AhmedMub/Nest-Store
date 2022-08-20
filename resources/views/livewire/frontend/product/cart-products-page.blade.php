<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i
                        class="fi-rs-home mr-5"></i>{{__('frontend/essentials.Home')}}</a>
                <span></span> {{__('frontend/essentials.Shop')}}
                <span></span> {{__('frontend/essentials.Cart')}}
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">{{__('frontend/cart.Your Cart')}}</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">{{__('frontend/cart.There are')}} <span class="text-brand">
                            @if ($cartContent > 0)
                            {{$cartContent}}
                            @endif
                        </span>{{__('frontend/cart.products in your cart')}}</h6>
                    <h6 class="text-body"><a wire:click="clearCart" href="javascript:void(0)" class="text-muted"><i
                                class="fi-rs-trash mr-5"></i>
                            {{__('frontend/cart.Clear Cart')}}</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="start pl-30" colspan="2">{{__('frontend/cart.Product')}}
                                </th>
                                <th scope="col">{{__('frontend/cart.Unit Price')}}</th>
                                <th scope="col">{{__('frontend/cart.Quantity')}}</th>
                                <th scope="col">{{__('frontend/cart.Subtotal')}}</th>
                                <th scope="col" class="end">{{__('frontend/cart.Remove')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                            @foreach ($products as $key => $product)
                            <tr class="pt-30">
                                <td class="image product-thumbnail pl-30 fix-width"><img
                                        src="{{$product->options['options']}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                            href="{{route('show.product',$product->options['slug'])}}">{{$product->name}}</a>
                                    </h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body"> ${{$product->price}} </h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a wire:click="minus('{{$key}}', {{$product->id}}, {{$product->qty}})"
                                                wire:loading.class="pe-none" href="javascript:void(0)"
                                                class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{$product->qty}}</span>
                                            <a wire:click="plus('{{$key}}', {{$product->id}}, {{$product->qty}})"
                                                wire:loading.class="pe-none" href="javascript:void(0)" class="qty-up"><i
                                                    class=" fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand"> ${{$product->subtotal}} </h4>
                                </td>
                                <td class="action text-center" data-title="Remove"><a
                                        wire:click="removeItem('{{$key}}')" href="javascript:void(0)"
                                        class="text-body"><i class="fi-rs-trash"></i></a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="{{route('shop')}}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>
                        {{__('frontend/cart.Continue Shopping')}}</a>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
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
                                        <h6 class="text-muted">Shipping fees: <strong class="text-brand">10%</strong>
                                        </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-heading text-end">${{$shippingFees}}</h4>
                                    </td>
                                </tr>
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
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${{$total}}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('checkout')}}" class="btn mb-20 w-100">Proceed To CheckOut<i
                            class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>
@push('added-head')

<style>
    .pe-none {
        cursor: not-allowed !important;
    }
</style>
@endpush
