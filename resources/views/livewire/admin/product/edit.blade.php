{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="extralargemodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit product</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form autocomplete="off" method="POST" wire:submit.prevent='update'>
                @csrf
                <input type="hidden" wire:model='product_id'>
                <div class="modal-body card-body py-2">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="nameEn">english name <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='name_en' id="nameEn" name="name_en" type="text"
                                    class="form-control {{$errors->has('name_en')?'is-invalid':''}}"
                                    placeholder="Product English Name" />
                                <x-defaults.input-error for="name_en" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="nameAr">arabic name <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='name_ar' id="nameAr" type="text"
                                    class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                                    placeholder="Product Arabic Name" />
                                <x-defaults.input-error for="name_ar" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="qty">Quantity<span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='qty' id="qty" type="text"
                                    class="form-control {{$errors->has('qty')?'is-invalid':''}}"
                                    placeholder="Product Quantity" />
                                <x-defaults.input-error for="qty" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="price">Price<span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='price' id="price" type="text"
                                    class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                    placeholder="Product Price" />
                                <x-defaults.input-error for="price" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="type">Type<span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='type' id="type" type="text"
                                    class="form-control {{$errors->has('type')?'is-invalid':''}}"
                                    placeholder="Product type" />
                                <x-defaults.input-error for="type" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="size">Size</label>
                                <input wire:model.defer='size' id="size" type="text"
                                    class="form-control {{$errors->has('size')?'is-invalid':''}}"
                                    placeholder="Product size" />
                                <x-defaults.input-error for="size" />
                            </div>
                        </div>

                        {{-- Product Main Image --}}
                        <div class="row">
                            <x-admin.product.edit.main-img wire:model="mainImage" />
                        </div>

                        {{-- Product Multi Images --}}
                        <div class="row">
                            <x-admin.product.edit.multi-images wire:model="multiImgs" multiple />
                        </div>

                        {{-- Product Descriptions --}}
                        <x-admin.product.edit.description :long-desc-en="$long_desc_en" :long-desc-ar="$long_desc_ar"
                            :packaging-delivery-en="$packaging_delivery_en"
                            :packaging-delivery-ar="$packaging_delivery_ar" :suggested-use-en="$suggested_use_en"
                            :suggested-use-ar="$suggested_use_ar" :other-ingredients-en="$other_ingredients_en"
                            :other-ingredients-ar="$other_ingredients_ar" :warnings-en="$warnings_en"
                            :warnings-ar="$warnings_en" />


                        {{-- Product Additional Info --}}
                        <x-admin.product.edit.additional-info />

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="mfg">manufacturing date (MFG) <span
                                        class="text-red">*</span></label>
                                <input wire:model.defer='mfg' id="mfg" type="text"
                                    class="form-control {{$errors->has('mfg')?'is-invalid':''}}"
                                    placeholder="YYYY-MM-DD" />
                                <div id="productMFG" class="d-none">{{$mfg}}</div>
                                <x-defaults.input-error for="mfg" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="text-capitalize form-label mt-0" for="mainCat">main category <span
                                        class="text-red">*</span> <span
                                        class="selectedMainCat badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1 badge-size">{{$mainCatN}}</span></label>
                                <select id="changeMainCat" autocomplete="off" class="form-select"
                                    wire:model='category_id' name="category_id">
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
                                        class="badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1 badge-size">{{$subCatN}}</span></label>
                                <select autocomplete="off" class="form-select" wire:model='subCategory_id'>
                                    <option>--selecte sub category--</option>
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
                                <label class="text-capitalize form-label mt-0">Sub Subcategory <span
                                        class="badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1 badge-size">{{$subSubCatN}}</span></label>
                                <select autocomplete="off" class="form-select" wire:model='subSubCategory_id'>
                                    <option>--selecte Sub sub-category--</option>
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
                                        class="text-red">*</span> <span
                                        class="badge rounded-pill bg-warning-gradient badge-sm me-1 mb-1 mt-1 badge-size">{{$vendorName}}</span></label>
                                <select autocomplete="off" class="form-select" wire:model.defer='vendor_id'>
                                    @foreach ($vendors as $vendor)
                                    <option value="{{$vendor->id}}" class="text-uppercase"> {{$vendor->name_en}}
                                    </option>
                                    @endforeach
                                </select>
                                <x-defaults.input-error for="vendor_id" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div>
                                <label class="custom-control custom-checkbox  col">
                                    <input wire:model.defer='hot_deals' id="hot_deals" value="1" type="checkbox"
                                        class="check-one custom-control-input check-one check-one2">
                                    <span class="custom-control-label">
                                        Hot Deals
                                    </span>
                                </label>
                            </div>
                            <div>
                                <label class="custom-control custom-checkbox  col">
                                    <input wire:model.defer='new_deals' id="new_deals" value="1" type="checkbox"
                                        class="check-one custom-control-input check-one check-one2">
                                    <span class="custom-control-label">
                                        New Deals
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
                </div>
            </form>
        </div>
    </div>
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

{{-- Alpine.js --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endpush
@push('child-scripts')
@once

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endonce
<script>
    window.addEventListener('getProductInfo', event => {
        var getMfg = $('#productMFG').html();
        console.log(getMfg);
            flatpickr('#mfg', {
                defaultDate:[getMfg]
            });
        })
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
{{-- <script src="{{asset('backend/assets/plugins/summernote/summernote1.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
{{-- Initialize SUMMERNOTE editor --}}
<script>
    $(document).ready(function() {
        let arr = ['#long_desc_en', '#long_desc_ar', '#packaging_delivery_en', '#packaging_delivery_ar', '#suggested_use_en', '#suggested_use_ar', '#other_ingredients_en', '#other_ingredients_ar', '#warnings_en', '#warnings_ar'];

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
    });
});
</script>

{{-- get selected category --}}
<script>
    $(function() {

        $('#changeMainCat').on('change', function() {

            var inputVal = $('.selectedMainCat').html();

            var selected = $('#changeMainCat option:selected').text();

            $('.selectedMainCat').text(selected);
        });
        });
</script>
@endpush
