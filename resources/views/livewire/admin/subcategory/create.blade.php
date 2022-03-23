<div class="card">
    <form method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new category</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameEn">english name</label>
                <input wire:model.defer='name_en' id="nameEn" name="name_en" type="text"
                    class="form-control {{$errors->has('name_en')?'is-invalid':''}}"
                    placeholder="Category English Name" />
                <x-defaults.input-error for="name_en" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameAr">arabic name</label>
                <input wire:model.defer='name_ar' id="nameAr" name="name_ar" type="text"
                    class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                    placeholder="Category Arabic Name" />
                <x-defaults.input-error for="name_ar" />
            </div>

            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="mainCat">main category</label>
                <select class="form-select" wire:model.defer="category_id" name="category_id" id="mainCat">
                    <option selected class="text-uppercase" value="">--selecte category--</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name_en}} </option>
                    @endforeach
                </select>
                <x-defaults.input-error for="category_id" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
