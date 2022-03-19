{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit selected category</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update'>
                @csrf
                <input type="hidden" wire:model='catId'>
                <div class="modal-body card-body py-2">
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button> <button class="btn btn-light"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
