<div class="card">
    <form method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new product tag</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameEn">tag english name</label>
                <input wire:model.defer='name_en' id="name_en" type="text"
                    class="form-control {{$errors->has('name_en')?'is-invalid':''}}" placeholder="Tag english name" />
                <x-defaults.input-error for="name_en" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameAr">tag arabic name</label>
                <input wire:model.defer='name_ar' id="name_ar" type="text"
                    class="form-control {{$errors->has('name_ar')?'is-invalid':''}}"
                    placeholder="Category Arabic Name" />
                <x-defaults.input-error for="name_ar" />
            </div>

            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="mainCat">choose product</label>
                <select autocomplete="off" class="form-select" wire:model.defer="product_id" name="product_id">
                    <option selected class="text-uppercase" value="">--selecte product--</option>
                    @foreach ($products as $product)
                    <option value="{{$product->id}}"> {{$product->name_en}} </option>
                    @endforeach
                </select>
                <x-defaults.input-error for="product_id" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
