<section class="section-padding pb-7">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class="">{{__('frontend/index.Daily Best Sells')}}</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">{{__('frontend/index.Bring nature into your home')}}</h2>
                        <a href="shop-grid-right.html" class="btn btn-xs">{{__('frontend/index.Shop Now')}} <i
                                class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-0" role="tabpanel" aria-labelledby="tab-0">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @if (count($getFiveProducts) > 0)
                                @foreach ($getFiveProducts as $product)
                                <x-frontend.products.single-product-view-two :user="$user" :product="$product"
                                    :langAr="$langAr" />
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{--End tab-content--}}
            </div>
            {{--End Col-lg-9--}}
        </div>
    </div>
    <livewire:frontend.product.wishlist />
</section>

@push('added-head')
<style>
    .banner-img.style-2 {
        background: url("{{asset('frontend/assets/defaultImages/banner-4.png')}}") no-repeat center bottom;
        background-size: cover;
    }
</style>
@endpush
