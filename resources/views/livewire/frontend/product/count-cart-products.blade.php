<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="javascript:void(0)">
        <img alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-cart.svg")}} />
        @if ($count > 0)
        <span class="pro-count blue">{{$count}}</span>
        @endif
    </a>
    <a href="javascript:void(0)"><span class="lable">Cart</span></a>
    @if (count($products) > 0)
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach ($products as $key => $product)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{route('show.product', $product->id)}}"><img alt="Nest"
                            src="{{$product->options['options']}}" /></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{route('show.product', $product->options['slug'])}}">{{$product->name}}</a></h4>
                    <h4><span>{{$product->qty}} × </span>{{$product->price}}</h4>
                </div>
                <div class="shopping-cart-delete">
                    <a wire:click="removeItem('{{$key}}')" href="javascript:void(0)"><i
                            class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>${{$totalPrice}}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{route('cart')}}" class="outline">View cart</a>
                <a href="{{route('checkout')}}">Checkout</a>
            </div>
        </div>
    </div>
    @endif
</div>
