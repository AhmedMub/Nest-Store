@section('title', 'Vendors')
@section('page-title','Add New Vendor')
<div class="card">
    {{-- <form autocomplete="off" method="POST" wire:submit.prevent='create'>
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
                            placeholder="Vendor English Name" />
                        <x-defaults.input-error for="name_en" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">arabic name <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='name_ar' id="nameAr" type="text"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Vendor Arabic Name" />
                        <x-defaults.input-error for="name_ar" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="logo">vendor logo</label>
                        <input type="file" wire:model.defer='logo' id="logo" class="form-control" />
                        <x-defaults.input-error for="logo" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="venAddress">vendor address <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='address' id="venAddress" type="text"
                            class="form-control {{$errors->has('address')?'is-invalid':''}}"
                            placeholder="Vendor Address:5171 W Campbell Ave undefined, Utah 53127 United States" />
                        <x-defaults.input-error for="address" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="venPhone">vendor phone <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='phone' id="venPhone" type="text"
                            class="form-control {{$errors->has('phone')?'is-invalid':''}}"
                            placeholder="Vendor Mobile Phone:965 67622829" />
                        <x-defaults.input-error for="phone" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="descEn">english description <span
                                class="text-red">*</span></label>
                        <textarea wire:model.defer='description_en' id="descEn"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Write a short English description" style="height: 100px"></textarea>
                        <x-defaults.input-error for="description_en" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="descAr">arabic description <span
                                class="text-red">*</span></label>
                        <input wire:model.defer='description_ar' id="descAr" type="text"
                            class="form-control {{$errors->has('description_ar')?'is-invalid':''}}"
                            placeholder="Write a short Arabic description" />
                        <x-defaults.input-error for="description_ar" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="startDate">start date</label>
                        <input wire:model.defer='start_date' id="startDate" type="text"
                            class="form-control {{$errors->has('start_date')?'is-invalid':''}}"
                            placeholder="Starting Date: dd/mm/yyyy" />
                        <x-defaults.input-error for="start_date" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="fb">enter facebook profile
                        </label>
                        <input wire:model.defer='facebook' id="fb" type="text"
                            class="form-control {{$errors->has('facebook')?'is-invalid':''}}"
                            placeholder="https://facebook/nestProfile " />
                        <x-defaults.input-error for="facebook" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">enter instgram profile</label>
                        <input wire:model.defer='name_ar' id="nameAr" type="text"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Vendor Arabic Name" />
                        <x-defaults.input-error for="name_ar" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">enter twitter profile</label>
                        <input wire:model.defer='name_ar' id="nameAr" type="text"
                            class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                            placeholder="Vendor Arabic Name" />
                        <x-defaults.input-error for="name_ar" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form> --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Full Colored Popover
            </div>
        </div>
        <div class="card-body">
            <div class="form-label  mb-2">
                Static Example
            </div>
            <div class="popover-static-demo mb-4 border br-3 pb-6">
                <div class="row row-sm">
                    <div class="col-md-6 mt-4">
                        <div class="popover popover-primary bs-popover-top">
                            <div class="popover-arrow"></div>
                            <h3 class="popover-header">Popover top</h3>
                            <div class="popover-body">
                                <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                    lacinia quam venenatis vestibulum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="popover popover-secondary bs-popover-bottom">
                            <div class="popover-arrow"></div>
                            <h3 class="popover-header">Popover Bottom</h3>
                            <div class="popover-body">
                                <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                    lacinia quam venenatis vestibulum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-label mb-2">
                Example
            </div>
            <div class="bg-light p-3 border br-3">
                <div class="row row-sm text-center">
                    <div class="col-sm-6 col-lg-3  mt-2 mb-2">
                        <button class="btn btn-primary" data-bs-container="body"
                            data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
                            data-bs-placement="top" data-bs-popover-color="primary" title="Popover top">Click
                            me</button>
                    </div>
                    <div class="col-sm-6 col-lg-3  mt-2 mb-2">
                        <button class="btn btn-secondary" data-bs-container="body"
                            data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus."
                            data-bs-placement="bottom" data-bs-popover-color="secondary" title="Popover bottom">Click
                            me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('child-scripts')

@endpush
