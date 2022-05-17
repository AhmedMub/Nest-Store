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
                            class="form-control {{$errors->has('type')?'is-invalid':''}}" placeholder="Product type" />
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card custom-bg">
                            <div class="card-header">
                                <h3 class="card-title">Product Descriptions</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel-group1" id="accordion1">

                                    {{-- short description --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1 ">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseFour" aria-expanded="false">short
                                                    description <span class="text-red">*</span></a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse show" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English <span
                                                            class="text-red">*</span></label>
                                                    <textarea wire:model.defer='short_desc_en' id="short_desc_en"
                                                        class="form-control {{$errors->has('short_desc_en')?'is-invalid':''}}"
                                                        placeholder="Write a short English description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="short_desc_en" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">Arabic <span
                                                            class="text-red">*</span></label>
                                                    <textarea wire:model.defer='short_desc_ar' id="short_desc_ar"
                                                        class="form-control {{$errors->has('short_desc_ar')?'is-invalid':''}}"
                                                        placeholder="Write a short Arabic description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="short_desc_ar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- long product description --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseSix" aria-expanded="false">long product
                                                    description</a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English</label>
                                                    <textarea wire:model.defer='long_desc_en' id="long_desc_en"
                                                        class="form-control {{$errors->has('long_desc_en')?'is-invalid':''}}"
                                                        placeholder="Write a long English description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="long_desc_en" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                                    <textarea wire:model.defer='long_desc_ar' id="long_desc_ar"
                                                        class="form-control {{$errors->has('long_desc_ar')?'is-invalid':''}}"
                                                        placeholder="Write a short Arabic description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="long_desc_ar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Packaging & Delivery --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseEight" aria-expanded="false">Packaging &
                                                    Delivery</a>
                                            </h4>
                                        </div>
                                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English</label>
                                                    <textarea wire:model.defer='packaging_delivery_en'
                                                        id="packaging_delivery_en"
                                                        class="form-control {{$errors->has('packaging_delivery_en')?'is-invalid':''}}"
                                                        placeholder="Write an english Packaging & Delivery description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="packaging_delivery_en" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                                    <textarea wire:model.defer='packaging_delivery_ar'
                                                        id="packaging_delivery_ar"
                                                        class="form-control {{$errors->has('packaging_delivery_ar')?'is-invalid':''}}"
                                                        placeholder="Write an Arabic Packaging & Delivery description"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="packaging_delivery_ar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Suggested Use --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseFifteen" aria-expanded="false">Suggested
                                                    Use</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFifteen" class="panel-collapse collapse" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English</label>
                                                    <textarea wire:model.defer='suggested_use_en' id="suggested_use_en"
                                                        class="form-control {{$errors->has('suggested_use_en')?'is-invalid':''}}"
                                                        placeholder="Write an English Suggested Use"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="suggested_use_en" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                                    <textarea wire:model.defer='suggested_use_ar' id="suggested_use_ar"
                                                        class="form-control {{$errors->has('suggested_use_ar')?'is-invalid':''}}"
                                                        placeholder="Write an Arabic Suggested Use"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="suggested_use_ar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Other Ingredients --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseEleven" aria-expanded="false">Other
                                                    Ingredients</a>
                                            </h4>
                                        </div>
                                        <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English</label>
                                                    <textarea wire:model.defer='other_ingredients_en'
                                                        id="other_ingredients_en"
                                                        class="form-control {{$errors->has('other_ingredients_en')?'is-invalid':''}}"
                                                        placeholder="Write an English Other Ingredients"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="other_ingredients_en" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">Arabic</label>
                                                    <textarea wire:model.defer='other_ingredients_ar'
                                                        id="other_ingredients_ar"
                                                        class="form-control {{$errors->has('other_ingredients_ar')?'is-invalid':''}}"
                                                        placeholder="Write an Arabic Other Ingredients"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="other_ingredients_ar" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Warnings --}}
                                    <div class="panel panel-default">
                                        <div class="panel-heading1">
                                            <h4 class="panel-title1">
                                                <a class="text-capitalize accordion-toggle collapsed"
                                                    data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                    href="#collapseThrteen" aria-expanded="false">Warnings</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThrteen" class="panel-collapse collapse" role="tabpanel"
                                            aria-expanded="false">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-capitalize form-label mt-0">English</label>
                                                    <textarea wire:model.defer='warnings_en' id="warnings_en"
                                                        class="form-control {{$errors->has('warnings_en')?'is-invalid':''}}"
                                                        placeholder="Write an English Warnings"
                                                        style="height: 100px"></textarea>
                                                    <x-defaults.input-error for="warnings_en" />
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="text-capitalize form-label mt-0">Arabic</label>
                                                        <textarea wire:model.defer='warnings_ar' id="warnings_ar"
                                                            class="form-control {{$errors->has('warnings_ar')?'is-invalid':''}}"
                                                            placeholder="Write an English Warnings"
                                                            style="height: 100px"></textarea>
                                                        <x-defaults.input-error for="warnings_ar" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="mfg">manufacturing date (MFG) <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='mfg' id="mfg" type="text"
                            class="form-control {{$errors->has('mfg')?'is-invalid':''}}" placeholder="YYYY-MM-DD" />
                        <x-defaults.input-error for="mfg" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="mainCat">main category <span
                                class="text-red">*</span></label>
                        <select autocomplete="off" class="form-select" wire:model.defer='category_id'>
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
                        <select autocomplete="off" class="form-select" wire:model.defer='subCategory_id'>
                            <option selected value="">--selecte sub-category--</option>
                            @foreach ($subCats as $cat)
                            <option value="{{$cat->id}}" class="text-uppercase"> {{$cat->name_en}} </option>
                            @endforeach

                        </select>
                        <x-defaults.input-error for="subCategory_id" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0">Sub Subcategory </label>
                        <select autocomplete="off" class="form-select" wire:model.defer='subSubCategory_id'>
                            <option selected value="">--selecte Sub sub-category--</option>
                            @foreach ($subSubCats as $cat)
                            <option value="{{$cat->id}}" class="text-uppercase"> {{$cat->name_en}} </option>
                            @endforeach
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





                <div class="col-md-12">
                    <div>
                        <label class="custom-control custom-checkbox  col">
                            <input wire:model.defer='hot_deals' value="1" type="checkbox"
                                class="check-one custom-control-input check-one check-one2">
                            <span class="custom-control-label">
                                New Deals
                            </span>
                        </label>
                    </div>
                    <div>
                        <label class="custom-control custom-checkbox  col">
                            <input wire:model.defer='new_deals' value="1" type="checkbox"
                                class="check-one custom-control-input check-one check-one2">
                            <span class="custom-control-label">
                                Hot Deals
                            </span>
                        </label>
                    </div>
                </div>

                {{--

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="descAr">arabic description <span
                                class="text-red">*</span></label>
                        <textarea wire:model.defer='description_ar' id="descAr"
                            class="form-control {{$errors->has('description_ar')?'is-invalid':''}}"
                            placeholder="Write a short Arabic description" style="height: 100px"></textarea>
                        <x-defaults.input-error for="description_ar" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="start_date">start date <span
                                class="text-red">*</span></label>

                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                            </div>
                            <input wire:model.lazy='start_date' id="start_date"
                                class="form-control {{$errors->has('start_date')?'is-invalid':''}}"
                                placeholder="DD/MM/YYYY">
                        </div>
                        <x-defaults.input-error for="start_date" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="fb">enter facebook profile ID <a
                                href="javascript:void(0)" data-bs-toggle="popover" title="Facebook Profile ID"
                                data-bs-content="Facebook URL:https://www.facebook.com/nestProfile, Only insert nestProfile"><i
                                    class="bi bi-patch-exclamation"></i></a>
                        </label>
                        <input wire:model.defer='facebook' id="fb" type="text"
                            class="form-control {{$errors->has('facebook')?'is-invalid':''}}"
                            placeholder="nestProfile" />
                        <x-defaults.input-error for="facebook" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="Insta">enter instagram profile ID <a
                                class="popOver" href="javascript:void(0)" data-bs-toggle="popover"
                                data-bs-content="Instgram URL:https://www.instagram.com/nestProfile, Only insert nestProfile"
                                title="Instgram Profile ID"><i class="bi bi-patch-exclamation"></i></a></label>
                        <input wire:model.defer='instagram' id="Insta" type="text"
                            class="form-control {{$errors->has('instagram')?'is-invalid':''}}"
                            placeholder="nestProfile" />
                        <x-defaults.input-error for="instagram" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="twit">enter twitter profile ID <a
                                href="javascript:void(0)" data-bs-toggle="popover"
                                data-bs-content="Twitter URL:https://twitter.com/nestProfile, Only insert nestProfile"
                                title="Twitter Profile ID"><i class="bi bi-patch-exclamation"></i></a></label>
                        <input wire:model.defer='twitter' id="twit" type="text"
                            class="form-control {{$errors->has('twitter')?'is-invalid':''}}"
                            placeholder="nestProfile" />
                        <x-defaults.input-error for="twitter" />
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
@push('child-styles')
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endpush
@push('child-scripts')
<script>
    flatpickr('#mfg', {});
</script>

<script>
    //category icon only checked one is allowed
$(function() {

$('.check-one').on('click',function() {
    $('.check-one').not(this).prop('checked', false);
    });

});

</script>
@endpush
