<div class="header-action-icon-2">
    <a href="{{route('products.wishList')}}">
        <img class="svgInject" alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-heart.svg")}} />
        @auth
        @if ($count > 0)
        <span class="pro-count blue">{{$count}}</span>
        @endif
        @endauth
    </a>
    <a href="{{route('products.wishList')}}"><span class="lable">{{__('frontend/header.Wishlist')}}</span></a>
</div>
