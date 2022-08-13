@php
//related product tags
$relatedTags = $product->tags()->get();
$headerName;
if($langAr) {
$headerName = $product->name_ar;
}else {
$headerName = $product->name_en;
}
@endphp
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="{{route('byCat.main', $product->productMainCat->slug)}}"> @if($langAr)
                    {{$product->productMainCat->name_ar}}
                    @else
                    {{$product->productMainCat->name_en}}
                    @endif </a> <span></span> @if ($langAr)
                {{$product->name_ar}}
                @else
                {{$product->name_en}}
                @endif
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{$product->getFirstMediaUrl('mainImage')}}"
                                                    alt="product image" />
                                            </figure>
                                            @foreach ($product->getMedia('multiImages') as $img)
                                            <figure class="border-radius-10">
                                                <img src="{{$img->getUrl()}}" alt="product image" />
                                            </figure>
                                            @endforeach

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            <div><img src="{{$product->getFirstMediaUrl('mainImage')}}"
                                                    alt="product image" />
                                            </div>
                                            @foreach ($product->getMedia('multiImages') as $img)
                                            <div><img src="{{$img->getUrl()}}" alt="product image" />
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        @if ($product->hot_deals == 1 && $product->new_deals == 0)
                                        <span
                                            class="stock-status out-stock text-capitalize">{{__('frontend/productsByCategory.Hot')}}</span>
                                        @elseif ($product->new_deals == 1 && $product->hot_deals == 0)
                                        <span
                                            class="stock-status out-stock text-capitalize">{{__('frontend/productsByCategory.New')}}</span>
                                        @endif
                                        <h2 class="title-detail">@if ($langAr)
                                            {{$product->name_ar}}
                                            @else
                                            {{$product->name_en}}
                                            @endif</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if (!empty($product->productDiscount->discount_percent) &&
                                                $product->discount_status == 1)
                                                <span
                                                    class="current-price text-brand">{{$product->productDiscount->discounted_price}}</span>
                                                <span>
                                                    <span
                                                        class="save-price font-md color3 ml-15">%{{$product->productDiscount->discount_percent}}
                                                        Off</span>
                                                    <span class="old-price font-md ml-15">${{$product->price}}</span>
                                                </span>
                                                @else
                                                <span class="current-price text-brand">${{$product->price}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="short-desc mb-30">
                                            <p class="font-lg">@if ($langAr)
                                                {{$product->productDescriptions->short_desc_ar}}
                                                @else
                                                {{$product->productDescriptions->short_desc_en}}
                                                @endif</p>
                                        </div>
                                        <livewire:frontend.product.add-to-cart :user="$user" :product="$product" />
                                        <div class="font-xs">
                                            <ul class="mr-50 float-start">
                                                <li class="mb-5">{{__('frontend/singleProduct.Type')}}: <span
                                                        class="text-brand">{{$product->type}}</span></li>
                                                <li class="mb-5">{{__('frontend/singleProduct.MFG')}}:<span
                                                        class="text-brand"> {{$product->productDates->mfg}}</span></li>
                                                <li>{{__('frontend/singleProduct.LIFE')}}: <span
                                                        class="text-brand">{{$product->productDates->remainingDays()}}</span>
                                                </li>
                                            </ul>
                                            <ul class="float-start">
                                                <li class="mb-5">{{__('frontend/singleProduct.SKU')}}: <span
                                                        class="text-brand">{{$product->sku}}</span></li>
                                                <li class="mb-5">{{__('frontend/singleProduct.Tags')}}:
                                                    @foreach ($relatedTags as $tag)
                                                    <a href="{{route('byTag', $tag->id)}}" rel="tag">{{$tag->name}}</a>
                                                    @endforeach
                                                </li>
                                                <li>{{__('frontend/singleProduct.Stock')}}:<span
                                                        class="in-stock text-brand ml-5">{{$product->qty}}
                                                        {{__('frontend/singleProduct.Items In Stock')}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        @if ($product->desc_status == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                                href="#Description">{{__('frontend/singleProduct.Description')}}</a>
                                        </li>
                                        @endif
                                        @if ($product->additionalInfo_status == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                                href="#Additional-info">
                                                {{__('frontend/singleProduct.Additional info')}}</a>
                                        </li>
                                        @endif
                                        @if ($product->vendor_status == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                                href="#Vendor-info">{{__('frontend/singleProduct.Vendor')}}</a>
                                        </li>
                                        @endif
                                        @if ($product->reviews_status == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                                href="#Reviews">{{__('frontend/singleProduct.Reviews')}} (3)</a>
                                        </li>
                                        @endif

                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        @if ($product->desc_status == 1)
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                @if ($langAr)
                                                {!! $product->productDescriptions->long_desc_ar !!}
                                                @else
                                                {!! $product->productDescriptions->long_desc_en !!}
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if ($product->additionalInfo_status == 1)
                                        <div class="tab-pane fade" id="Additional-info">
                                            <table class="font-md">
                                                <tbody>
                                                    <tr class="stand-up">
                                                        <th>{{__('frontend/singleProduct.Stand Up')}}</th>
                                                        <td>
                                                            <p>@if ($langAr)
                                                                {{$product->productAdditionalInfo->stand_up_ar}}
                                                                @else
                                                                {{$product->productAdditionalInfo->stand_up_en}}
                                                                @endif</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="folded-wo-wheels">
                                                        <th>{{__('frontend/singleProduct.Folded')}}
                                                            ({{__('frontend/singleProduct.w/o wheels')}})</th>
                                                        <td>
                                                            <p>@if ($langAr)
                                                                {{$product->productAdditionalInfo->folded_ar}}
                                                                @else
                                                                {{$product->productAdditionalInfo->folded_en}}
                                                                @endif</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="frame">
                                                        <th>{{__('frontend/singleProduct.Frame')}}</th>
                                                        <td>
                                                            <p>@if ($langAr)
                                                                {{$product->productAdditionalInfo->frame_ar}}
                                                                @else
                                                                {{$product->productAdditionalInfo->frame_en}}
                                                                @endif</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="pa_color">
                                                        <th>{{__('frontend/singleProduct.Color')}}</th>
                                                        <td>
                                                            <p>@if ($langAr)
                                                                {{$product->productAdditionalInfo->color_ar}}
                                                                @else
                                                                {{$product->productAdditionalInfo->color_en}}
                                                                @endif</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="pa_size">
                                                        <th>{{__('frontend/singleProduct.Size')}}</th>
                                                        <td>
                                                            <p>@if ($langAr)
                                                                {{$product->productAdditionalInfo->size_ar}}
                                                                @else
                                                                {{$product->productAdditionalInfo->size_en}}
                                                                @endif</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif
                                        @if ($product->vendor_status == 1)
                                        <div class="tab-pane fade" id="Vendor-info">
                                            <div class="vendor-logo d-flex mb-30">
                                                <img src="{{$product->productVendor->getFirstMediaUrl('vendorLogo', 'thumb')}}"
                                                    alt="" />
                                                <div class="vendor-name ml-15">
                                                    <h6>
                                                        <a href="{{route('byVendor', $product->productVendor->slug)}}">
                                                            @if ($langAr)
                                                            {{$product->productVendor->name_ar}}
                                                            @else
                                                            {{$product->productVendor->name_en}}
                                                            @endif</a>
                                                    </h6>
                                                    <div class="product-rate-cover text-end">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="contact-infor mb-50">
                                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}"
                                                        alt="" /><strong>
                                                        {{__('frontend/singleProduct.Address')}}:
                                                    </strong> <span>{{$product->productVendor->address}}</span></li>
                                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}"
                                                        alt="" /><strong>
                                                        {{__('frontend/singleProduct.Contact Seller')}}:</strong><span>
                                                        {{$product->productVendor->phone}}</span></li>
                                            </ul>
                                            <div class="d-flex mb-55">
                                                <div class="mr-30">
                                                    <p class="text-brand font-xs">
                                                        {{__('frontend/singleProduct.Rating')}}</p>
                                                    <h4 class="mb-0">92%</h4>
                                                </div>
                                                <div class="mr-30">
                                                    <p class="text-brand font-xs">
                                                        {{__('frontend/singleProduct.Ship on time')}}</p>
                                                    <h4 class="mb-0">100%</h4>
                                                </div>
                                            </div>
                                            <p>@if ($langAr)
                                                {{$product->productVendor->description_ar}}
                                                @else
                                                {{$product->productVendor->description_en}}
                                                @endif</p>
                                        </div>
                                        @endif
                                        @if ($product->reviews_status == 1)
                                        <div class="tab-pane fade" id="Reviews">
                                            <!--Comments-->
                                            <div class="comments-area">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h4 class="mb-30">Customer questions & answers</h4>
                                                        <div class="comment-list">
                                                            <div
                                                                class="single-comment justify-content-between d-flex mb-30">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-2.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Sienna</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">December
                                                                                    4, 2021 at 3:12 pm </span>
                                                                            </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 100%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-3.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Brenna</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">December
                                                                                    4, 2021 at 3:12 pm </span>
                                                                            </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 80%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="assets/imgs/blog/author-4.png"
                                                                            alt="" />
                                                                        <a href="#"
                                                                            class="font-heading text-brand">Gemma</a>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <div
                                                                            class="d-flex justify-content-between mb-10">
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="font-xs text-muted">December
                                                                                    4, 2021 at 3:12 pm </span>
                                                                            </div>
                                                                            <div class="product-rate d-inline-block">
                                                                                <div class="product-rating"
                                                                                    style="width: 80%"></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                            consectetur adipisicing elit. Delectus,
                                                                            suscipit exercitationem accusantium
                                                                            obcaecati quos voluptate nesciunt facilis
                                                                            itaque modi commodi dignissimos sequi
                                                                            repudiandae minus ab deleniti totam officia
                                                                            id incidunt? <a href="#"
                                                                                class="reply">Reply</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h4 class="mb-30">Customer reviews</h4>
                                                        <div class="d-flex mb-30">
                                                            <div class="product-rate d-inline-block mr-15">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <h6>4.8 out of 5</h6>
                                                        </div>
                                                        <div class="progress">
                                                            <span>5 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100">50%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>4 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100">25%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>3 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                                aria-valuemax="100">45%</div>
                                                        </div>
                                                        <div class="progress">
                                                            <span>2 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                                aria-valuemax="100">65%</div>
                                                        </div>
                                                        <div class="progress mb-30">
                                                            <span>1 star</span>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                                aria-valuemax="100">85%</div>
                                                        </div>
                                                        <a href="#" class="font-xs text-muted">How are ratings
                                                            calculated?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--comment form-->
                                            <div class="comment-form">
                                                <h4 class="mb-15">Add a review</h4>
                                                @guest
                                                <div class="h5"><a href="{{route('login')}}">Login</a> to add review
                                                </div>
                                                @endguest
                                                @auth
                                                <div class="product-rate d-inline-block mb-30"></div>
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12">
                                                        <form class="form-contact comment_form" action="#"
                                                            id="commentForm">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control w-100"
                                                                            name="comment" id="comment" cols="30"
                                                                            rows="9"
                                                                            placeholder="Write Comment"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="name"
                                                                            id="name" type="text" placeholder="Name" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="email"
                                                                            id="email" type="email"
                                                                            placeholder="Email" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="website"
                                                                            id="website" type="text"
                                                                            placeholder="Website" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="button button-contactForm">Submit
                                                                    Review</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                @endauth
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h2 class="section-title style-1 mb-30">Related products</h2>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @if (count($relatedProduct) > 0)
                                        @foreach ($relatedProduct as $product)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <x-frontend.products.single-product-view :langAr="$langAr" :user="$user"
                                                :headerName="$headerName" :product="$product" />
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                        <div class="sidebar-widget widget-vendor mb-30 bg-grey-9 box-shadow-none">
                            <h5 class="section-title style-3 mb-20">{{__('frontend/singleProduct.Vendor')}}</h5>
                            <div class="vendor-logo d-flex mb-30">
                                <img src="{{$product->productVendor->getFirstMediaUrl('vendorLogo','thumb')}}" alt="" />
                                <div class="vendor-name ml-15">
                                    <h6>
                                        <a href="vendor-details-2.html">@if ($langAr)
                                            {{$product->productVendor->name_ar}}
                                            @else
                                            {{$product->productVendor->name_en}}
                                            @endif</a>
                                    </h6>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}"
                                        alt="" /><strong>{{__('frontend/singleProduct.Address')}}:
                                    </strong> <span>{{$product->productVendor->address}}</span>
                                </li>
                                <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}"
                                        alt="" /><strong>
                                        {{__('frontend/singleProduct.Contact Seller')}}:</strong><span>
                                        {{$product->productVendor->phone}}</span></li>
                                <li class="hr"><span></span></li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <div class="mx-3">
                                    <p class="text-brand font-xs">{{__('frontend/singleProduct.Rating')}}</p>
                                    <h4 class="mb-0">92%</h4>
                                </div>
                                <div class="mx-3">
                                    <p class="text-brand font-xs">{{__("frontend/singleProduct.Ship on time")}}</p>
                                    <h4 class="mb-0">100%</h4>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">{{__('frontend/singleProduct.Category')}}</h5>
                            <ul>
                                @if (count($categories) > 0)
                                @foreach ($categories as $cat)
                                <li>
                                    <a href="shop-grid-right.html">
                                        @if ($cat->icon != null && $cat->default_icon_status == 0)
                                        <img src="{{asset('storage/frontend/categories/'.$cat->icon)}}" alt="" />
                                        @endif
                                        @if ($cat->default_icon == 1)
                                        <img src="{{asset('storage/default_images/'.$cat->default_icon)}}" alt="icon">
                                        @endif
                                        @if ($langAr)
                                        {{$cat->name_ar}}
                                        @else
                                        {{$cat->name_en}}
                                        @endif</a><span class="count"> {{$cat->productMainCat->count()}} </span>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                            <h5 class="section-title style-1 mb-30">{{__('frontend/singleProduct.New products')}}</h5>
                            @foreach ($latestProducts as $item)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{$item->getFirstMediaUrl('mainImage')}}" alt="#" />
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{route('show.product', $item->slug)}}">@if ($langAr)
                                            {{$item->name_ar}}
                                            @else
                                            {{$item->name_en}}
                                            @endif</a></h5>
                                    <p class="price mb-0 mt-5">{{$item->price}}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                            <img src="{{asset('frontend/assets/defaultImages/banner-11.png')}}" alt="banner" />
                            <div class="banner-text">
                                <span>Oganic</span>
                                <h4>
                                    Save 17% <br />
                                    on <span class="text-brand">Oganic</span><br />
                                    Juice
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:frontend.product.wishlist />
</main>
