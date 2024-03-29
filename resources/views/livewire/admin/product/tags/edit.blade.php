<div wire:ignore.self class="modal fade" id="smallmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit tag</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form autocomplete="off" method="POST" wire:submit.prevent='update'>
                @csrf
                <input type="hidden" wire:model='tagId'>
                <div class="modal-body card-body py-2">
                    <div class="form-group">
                        <label class="d-inline text-capitalize form-label mt-0">english name <span
                                class="text-red">*</span></label> <span
                            class="badge bg-default badge-sm me-1 mb-1 mt-1"> {{$name_en}} </span>
                        <input wire:model='name.en' type="text"
                            class="form-control {{$errors->has('name.en')?'is-invalid':''}}" />
                        <x-defaults.input-error for="name.en" />
                    </div>
                    <div class="form-group">
                        <label class="d-inline text-capitalize form-label mt-0">arabic name <span
                                class="text-red">*</span></label> <span
                            class="badge bg-default badge-sm me-1 mb-1 mt-1"> {{$name_ar}} </span>
                        <input wire:model='name.ar' type="text"
                            class="form-control {{$errors->has('name.ar')?'is-invalid':''}}" />
                        <x-defaults.input-error for="name.ar" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="javascript:void(0)" class="btn btn-light text-capitalize" data-bs-dismiss="modal">close</a>
                </div>
            </form>
        </div>
    </div>
</div>
