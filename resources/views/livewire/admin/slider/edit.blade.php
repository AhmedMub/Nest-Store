{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">Edit slider</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update' class="make-relative">
                @csrf
                <div class="card-header">
                    <div class="card-title text-capitalize">Edit {{$title_en}} Slider</div>
                </div>
                <div class="card-body py-2">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="title_en">english title<span
                                class="text-red">*</span></label>
                        <input wire:model.defer='title_en' id="title_en" type="text"
                            class="form-control {{$errors->has('title_en')?'is-invalid':''}}"
                            placeholder="Slider English Title" />
                        <x-defaults.input-error for="title_en" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="title_ar">arabic title<span
                                class="text-red">*</span></label>
                        <input wire:model.defer='title_ar' id="title_ar" type="text"
                            class="form-control {{$errors->has('title_ar')?'is-invalid':''}}"
                            placeholder="Slider Arabic Title" />
                        <x-defaults.input-error for="title_ar" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="description_en">english description</label>
                        <input wire:model.defer='description_en' id="description_en" type="text"
                            class="form-control {{$errors->has('description_en')?'is-invalid':''}}"
                            placeholder="Slider English Description" />
                        <x-defaults.input-error for="description_en" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="description_ar">arabic description</label>
                        <input wire:model.defer='description_ar' id="description_ar" type="text"
                            class="form-control {{$errors->has('description_ar')?'is-invalid':''}}"
                            placeholder="Slider Arabic Description" />
                        <x-defaults.input-error for="description_ar" />
                    </div>

                    <div class="form-group">
                        <x-admin.slider.create.slider-image wire:model='sliderImage' title="Edit Slider Image" />
                    </div>

                </div>
                <div class="card-footer">
                    <div class="btn-list">
                        <button class="btn btn-success float-sm-end" type="submit">Add<i
                                class="fa fa-plus ms-1"></i></button>
                    </div>
                </div>
                <div wire:loading wire:target='create'>
                    <x-admin.partials.loader />
                </div>
            </form>
        </div>
    </div>
</div>
