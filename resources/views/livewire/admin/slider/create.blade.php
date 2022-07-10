<div class="card">
    <form method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new Slider</div>
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
                <x-admin.slider.create.slider-image wire:model='sliderImage' />
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
@once
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
@endonce
@endpush

@push('child-scripts')
@once
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endonce
@endpush
