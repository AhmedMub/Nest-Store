<div class="card">
    <form method="POST" wire:submit.prevent='create'>
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
                <label class="text-capitalize form-label mt-0" for="catIcon">icon</label>
                <input type="file" wire:model.defer='icon' id="catIcon" name="icon" class="form-control" />
                <x-defaults.input-error for="icon" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>
