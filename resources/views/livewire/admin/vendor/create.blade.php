@section('title', 'Vendors')
@section('page-title','Add New Vendor')
<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">Insert New Vendor</div>
        </div>
        <div class="card-body py-2">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameEn">english name <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='name_en' id="nameEn" name="name_en" type="text"
                            class="form-control {{$errors->has('name_en')?'is-invalid':''}}"
                            placeholder="Vendor English Name" required />
                        <x-defaults.input-error for="name_en" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">arabic name <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='name_ar' id="nameAr" type="text"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Vendor Arabic Name" required />
                        <x-defaults.input-error for="name_ar" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <x-admin.partials.spatie-image forError="logo" wire:model='logo' title="vendor logo" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="venAddress">vendor address <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='address' id="venAddress" type="text"
                            class="form-control {{$errors->has('address')?'is-invalid':''}}"
                            placeholder="Vendor Address:5171 W Campbell Ave undefined, Utah 53127 United States"
                            required />
                        <x-defaults.input-error for="address" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="venPhone">vendor phone <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='phone' id="venPhone" type="text"
                            class="form-control {{$errors->has('phone')?'is-invalid':''}}"
                            placeholder="Vendor Mobile Phone" required />
                        <x-defaults.input-error for="phone" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="descEn">english description <span
                                class="text-red">*</span></label>
                        <textarea wire:model.defer='description_en' id="descEn"
                            class="form-control {{$errors->has('description_en')?'is-invalid':''}}"
                            placeholder="Write a short English description" style="height: 100px" required></textarea>
                        <x-defaults.input-error for="description_en" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="descAr">arabic description <span
                                class="text-red">*</span></label>
                        <textarea wire:model.defer='description_ar' id="descAr"
                            class="form-control {{$errors->has('description_ar')?'is-invalid':''}}"
                            placeholder="Write a short Arabic description" style="height: 100px" required></textarea>
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
                                placeholder="YYYY/MM/DD" required>
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
                </div>
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
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@once
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endonce
@endpush
@push('child-scripts')
<script>
    flatpickr('#start_date', {});
</script>
@once
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endonce
@endpush
