<div class="card">
    <form method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new sub-subcategory</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameEn">english name</label>
                <input wire:model.defer='name_en' id="nameEn" name="name_en" type="text"
                    class="form-control {{$errors->has('name_en')?'is-invalid':''}}" placeholder="Category English Name"
                    required />
                <x-defaults.input-error for="name_en" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameAr">arabic name</label>
                <input wire:model.defer='name_ar' id="nameAr" name="name_ar" type="text"
                    class="form-control {{$errors->has('name_ar')?'is-invalid':''}}" placeholder="Category Arabic Name"
                    required />
                <x-defaults.input-error for="name_ar" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="mainCat">Sub-Subcategory category</label>
                <select autocomplete="off" class="form-select" wire:model.defer="subcategory_id" name="subcategory_id"
                    id="mainCat">
                    <option selected class="text-uppercase" value="">--selecte sub-subcategory--</option>
                    @foreach ($subcategory as $subCat)
                    <option value="{{$subCat->id}}"> {{$subCat->name_en}} </option>
                    @endforeach
                </select>
                <x-defaults.input-error for="subcategory_id" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
