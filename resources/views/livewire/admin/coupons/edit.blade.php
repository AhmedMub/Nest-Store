{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit selected coupon</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update'>
                @csrf
                <div class="modal-body card-body py-2">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="name">name</label>
                        <input wire:model.defer='name' id="name" type="text"
                            class="form-control {{$errors->has('name')?'is-invalid':''}}"
                            placeholder="Add name for the coupon" />
                        <x-defaults.input-error for="name" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="discount">arabic name</label>
                        <input wire:model.defer='discount' id="discount" type="text"
                            class="form-control {{$errors->has('discount')?'is-invalid':''}}"
                            placeholder="Add Discount Number Examples: 10, 20, etc." />
                        <x-defaults.input-error for="discount" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="editValidity">choose coupon dates </label>
                        <input wire:model.defer='validity' id="editValidity" type="text"
                            class="form-control {{$errors->has('validity')?'is-invalid':''}}"
                            placeholder="YYYY-MM-DD" />
                        <x-defaults.input-error for="validity" />
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


@push('child-scripts')
<script>
    $(function() {
            flatpickr('#editValidity', {
            mode: "range",
            disable: [
            {
                from: "0001-01-01",
                to: "{{$carbonDate}}"
            }
            ],
            //to clear flatpickr after udpate
            onReady: function() {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                window.addEventListener('clearDates', event => {flatPickrInstance.clear()});
            }
        });
    });
</script>
@endpush
