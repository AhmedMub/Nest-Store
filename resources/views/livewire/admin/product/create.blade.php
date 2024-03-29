@section('title', 'Product')
@section('page-title','Add New Product')
<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">Insert New product</div>
        </div>
        <div class="card-body py-2">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameEn">english name <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='name_en' id="nameEn" name="name_en" type="text"
                            class="form-control {{$errors->has('name_en')?'is-invalid':''}}"
                            placeholder="Product English Name" required />
                        <x-defaults.input-error for="name_en" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">arabic name <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='name_ar' id="nameAr" type="text"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Product Arabic Name" required />
                        <x-defaults.input-error for="name_ar" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="qty">Quantity<span
                                class="text-red">*</span></label>
                        <input wire:model.defer='qty' id="qty" type="text"
                            class="form-control {{$errors->has('qty')?'is-invalid':''}}" placeholder="Product Quantity"
                            required />
                        <x-defaults.input-error for="qty" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="price">Price<span
                                class="text-red">*</span></label>
                        <input wire:model.defer='price' id="price" type="text"
                            class="form-control {{$errors->has('price')?'is-invalid':''}}" placeholder="Product Price"
                            required />
                        <x-defaults.input-error for="price" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="type">Type<span
                                class="text-red">*</span></label>
                        <input wire:model.defer='type' id="type" type="text"
                            class="form-control {{$errors->has('type')?'is-invalid':''}}" placeholder="Product type"
                            required />
                        <x-defaults.input-error for="type" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="size">Size</label>
                        <input wire:model.defer='size' id="size" type="text"
                            class="form-control {{$errors->has('size')?'is-invalid':''}}" placeholder="Product size" />
                        <x-defaults.input-error for="size" />
                    </div>
                </div>

                {{-- Product Main Image --}}
                <div class="row">
                    <x-admin.product.create.mainimg wire:model="mainImage" />
                </div>

                {{-- Product Multi Images --}}
                <div class="row">
                    <x-admin.product.create.multi-images wire:model="multiImgs" multiple />
                </div>

                {{-- Product Descriptions --}}
                <x-admin.product.create.description />


                {{-- Product Additional Info --}}
                <x-admin.product.create.additional-info />

                {{-- product Tags --}}
                @if (count($tags) > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card custom-bg">
                            <div class="card-header">
                                <h3 class="card-title">Add Product Tags </h3>
                            </div>
                            <div class="card-body">
                                <div class="panel-group1" id="accordion1">
                                    <div class="mb-2">
                                        @if (!empty($addedTags))
                                        @foreach ($addedTags as $tag)
                                        <span class="tag tag-purple">
                                            {{$tag->name}}
                                            <a href="javascript:void(0)" wire:click="removeFromCol({{$tag->id}})"
                                                class="tag-addon fix-tag-hover"><i class="fe fe-x"></i></a>
                                        </span>
                                        @endforeach
                                        @endif
                                    </div>
                                    <input wire:model.debounce.300ms="queryTag" class="form-control w-100"
                                        placeholder="Search for Below Tags..." type="search">

                                    {{-- get tag serach results --}}
                                    <div>
                                        @if (!empty($queryTag))
                                        <div class="list-group">
                                            @if (!empty($getTags))
                                            @foreach ($getTags as $tag)
                                            <a href="javascript:void(0)" wire:click="addTagToCol({{$tag->id}})"
                                                class="list-group-item list-group-item-action flex-column align-items-start">
                                                <h5 class="mb-1">{{$tag->name}}</h5>
                                            </a>
                                            @endforeach
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                    <div class="bg-white example mt-2">
                                        <div class="tags">
                                            @foreach ($tags as $tag)
                                            <span class="tag">{{$tag->name}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="mfg">manufacturing date (MFG) <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='mfg' id="mfg" type="text"
                            class="form-control {{$errors->has('mfg')?'is-invalid':''}}" placeholder="YYYY-MM-DD"
                            required />
                        <x-defaults.input-error for="mfg" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="exp">Expiration date (EXP) <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='exp' id="exp" type="text"
                            class="form-control {{$errors->has('exp')?'is-invalid':''}}" placeholder="YYYY-MM-DD"
                            required />
                        <x-defaults.input-error for="exp" />
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="mainCat">main category <span
                                class="text-red">*</span></label>
                        <select autocomplete="off" class="form-select" wire:model='category_id'>
                            <option selected value="">--selecte main category--</option>
                            @foreach ($mainCats as $cat)
                            <option value="{{$cat->id}}" class="text-uppercase"> {{$cat->name_en}} </option>
                            @endforeach

                        </select>
                        <x-defaults.input-error for="category_id" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0">Subcategory <span
                                class="text-red">*</span></label>
                        <select autocomplete="off" class="form-select" wire:model='subCategory_id'>
                            <option selected value="">--selecte sub-category--</option>
                            @if (!empty($getSubCats))
                            @foreach ($getSubCats as $cat)
                            <option value="{{$cat->id}}" class="text-uppercase"> {{$cat->name_en}} </option>
                            @endforeach
                            @endif

                        </select>
                        <x-defaults.input-error for="subCategory_id" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0">Sub Subcategory </label>
                        <select autocomplete="off" class="form-select" wire:model='subSubCategory_id'>
                            <option selected value="">--selecte Sub sub-category--</option>
                            @if (!empty($getSubSubCats))
                            @foreach ($getSubSubCats as $cat)
                            <option value="{{$cat->id}}" class="text-uppercase"> {{$cat->name_en}} </option>
                            @endforeach
                            @endif
                        </select>
                        <x-defaults.input-error for="subSubCategory_id" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0">Select Vednor<span
                                class="text-red">*</span></label>
                        <select autocomplete="off" class="form-select" wire:model.defer='vendor_id'>
                            <option selected value="">--selecte vendor--</option>
                            @foreach ($vendors as $vendor)
                            <option value="{{$vendor->id}}" class="text-uppercase"> {{$vendor->name_en}} </option>
                            @endforeach
                        </select>
                        <x-defaults.input-error for="vendor_id" />
                    </div>
                </div>
                <div class="col-12">
                    <div>
                        <label class="w-25 fix-lable-click custom-control custom-checkbox  col">
                            <input wire:model='hot_deals' id="hot_deals" type="checkbox"
                                class="check-one custom-control-input check-one check-one2">
                            <span class="custom-control-label">
                                Hot Deals
                            </span>
                        </label>
                    </div>
                    <div>
                        <label class="w-25 custom-control custom-checkbox  col">
                            <input wire:model='new_deals' id="new_deals" type="checkbox"
                                class="check-one custom-control-input check-one check-one2">
                            <span class="custom-control-label">
                                New Deals
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <x-loading-button btn="add" class="btn btn-success float-sm-end" icon="fa fa-plus ms-1" />
            </div>
        </div>
    </form>
</div>
@push('child-styles')
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- Include summernote stylesheet --}}
<link href="{{asset('backend/assets/plugins/summernote/summernote.min.css')}}" rel="stylesheet">

{{-- summerNote icons --}}

<style>
    @font-face {
        font-display: auto;
        font-family: summernote;
        font-style: normal;
        font-weight: 400;
        src: url(font/summernote.eot?#iefix) format("embedded-opentype"),
        url("{{asset('backend/assets/plugins/summernote/font/summernote.woff2')}}") format("woff2"),
        url("{{asset('backend/assets/plugins/summernote/font/summernote.woff')}}") format("woff"),
        url("{{asset('backend/assets/plugins/summernote/font/summernote.ttf')}}") format("truetype")
    }

    @font-face {
        font-family: "Glyphicons Halflings";
        src: url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.eot')}}");
        src: url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.eot')}}?#iefix") format("embedded-opentype"),
        url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.woff2')}}") format("woff2"),
        url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.woff')}}") format("woff"),
        url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.ttf')}}") format("truetype"),
        url("{{asset('backend/iconfonts/glyphicons/fonts/glyphicons-halflings-regular.svg')}}#glyphicons_halflingsregular") format("svg");
    }

    .note-editable {
        background-color: #fff;
    }
</style>

{{--@once: to fix issue if we have more than one of the same component on a page the CDN calls will be duplicated.
Laravel provides the @once directive for this reason. It only includes that portion of the template once per rendering
cycle. --}}
@once

<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endonce

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endpush
@push('child-scripts')
@once
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endonce
<script>
    flatpickr('#mfg', {});
    flatpickr('#exp', {});
</script>

<script>
    $(function() {
 //checked one is allowed
$('.check-one').on('click',function() {
    $('.check-one').not(this).prop('checked', false);
    });
});
</script>

<!-- INTERNAL SUMMERNOTE Editor JS -->
<script src="{{asset('backend/assets/plugins/summernote/summernote1.js')}}"></script>

{{-- Initialize SUMMERNOTE editor --}}
<script>
    $(document).ready(function() {
        // let arr = ['#long_desc_en', '#long_desc_ar', '#packaging_delivery_en', '#packaging_delivery_ar', '#suggested_use_en', '#suggested_use_ar', '#other_ingredients_en', '#other_ingredients_ar', '#warnings_en', '#warnings_ar'];

        //modifided
        let arr = ['#long_desc_en', '#long_desc_ar'];

        let arrLivewier = arr.map(val=> val.slice(1));

  $.each(arr, function (index, value) {
        let livewireVal = value.replace('#', '');
    $(value).summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', ['fullscreen', 'help']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set(livewireVal, contents);
                }
            }
        });
        //reset summernote fields after submit successfully
        window.addEventListener('resetSummerNote', event => {
            $(value).summernote('reset');
        })
    });
});
</script>
@endpush
