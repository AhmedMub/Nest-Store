<div class="header-action-icon-2">
    <a class="javascript:void(0)" href="shop-cart.html">
        <img alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-cart.svg")}} />
        @isset($count)
        <span class="pro-count blue">{{$count}}</span>
        @endisset

    </a>
    <a href="javascript:void(0)"><span class="lable">Cart</span></a>

    @isset($products)
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach ($products as $key => $product)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{route('show.product', $product->id)}}"><img alt="Nest"
                            src="{{$product->options['options']}}" /></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="javascript:void(0)">{{$product->name}}</a></h4>
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
                <h4>Total <span>$4000.00</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="javascript:void(0)" class="outline">View cart</a>
                <a href="javascript:void(0)">Checkout</a>
            </div>
        </div>
    </div>
    @endisset
</div>
