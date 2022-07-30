<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>{{__('frontend/index.Popular Products')}}</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button wire:click="getAllProducts" class="nav-link @if ($activeCat == 'all') active @endif"
                        id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab"
                        aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @if (count($getSixCats) > 0)
                @foreach ($getSixCats as $cat)
                <li class="nav-item" role="presentation">
                    <button wire:click="orderByCategory({{$cat->id}})"
                        class="nav-link @if ($activeCat == $cat->id) active @endif" id=" nav-tab-one"
                        data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                        aria-selected="true">@if ($langAr)
                        {{$cat->name_ar}}
                        @else
                        {{$cat->name_en}}
                        @endif</button>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        {{--End nav-tabs--}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($getLatestTenProducts as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <x-frontend.products.single-product-view :user="$user" :headerName="$headerName"
                            :product="$product" :langAr="$langAr" />
                    </div>
                    @endforeach
                </div>
                {{--End product-grid-4--}}
            </div>
            {{--End tab-content--}}
        </div>
        {{-- /- this to file an emit event for backend component --}}
        <livewire:frontend.product.wishlist />
</section>
