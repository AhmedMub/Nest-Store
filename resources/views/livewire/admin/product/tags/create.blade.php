<div class="card">
    <form method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new product tag</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="nameEn">tag english name</label>
                <input wire:model.defer='name' type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}"
                    placeholder="Tag name" />
                <x-defaults.input-error for="name" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
