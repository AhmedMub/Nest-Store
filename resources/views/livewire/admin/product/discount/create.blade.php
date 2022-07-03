{{-- //TODO must add required for all inputs --}}
<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new discount</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="name">discount name</label>
                <input wire:model.defer='name' id="name" type="text"
                    class="form-control {{$errors->has('name')?'is-invalid':''}}"
                    placeholder="Add name for the discount" />
                <x-defaults.input-error for="name" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="description">discount description</label>
                <input wire:model.defer='description' id="description" type="text"
                    class="form-control {{$errors->has('description')?'is-invalid':''}}"
                    placeholder="Add short description for the discount" />
                <x-defaults.input-error for="description" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="discount_percent">discount</label>
                <input wire:model.defer='discount_percent' id="discount_percent" type="text"
                    class="form-control {{$errors->has('discount_percent')?'is-invalid':''}}"
                    placeholder="Add Discount Examples: 10, 20, 30, etc.." />
                <x-defaults.input-error for="discount_percent" />
                <p class="text-muted"><small>Discount numbers will be converted to percentage.</small></p>
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="product_id">choose product</label>
                <select autocomplete="off" class="form-select" wire:model.defer="product_id" id="product_id">
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
