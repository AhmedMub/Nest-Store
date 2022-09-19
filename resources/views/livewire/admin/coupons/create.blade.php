<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">creat new coupon</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="name">coupon name</label>
                <input wire:model.defer='name' id="name" type="text"
                    class="form-control {{$errors->has('name')?'is-invalid':''}}"
                    placeholder="Add name for the discount" required />
                <x-defaults.input-error for="name" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="discount">coupon discount</label>
                <input wire:model.defer='discount' id="discount" type="text"
                    class="form-control {{$errors->has('discount')?'is-invalid':''}}"
                    placeholder="Add Discount Examples: 10, 20, 30, etc.." required />
                <x-defaults.input-error for="discount" />
                <p class="text-muted"><small>Note: Discount numbers will be converted to percentage.</small></p>
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="validity">choose coupon dates </label>
                <input wire:model.defer='validity' id="validity" type="text"
                    class="form-control {{$errors->has('validity')?'is-invalid':''}}" placeholder="YYYY-MM-DD"
                    required />
                <x-defaults.input-error for="validity" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button data-clear class="test btn btn-success float-sm-end" type="submit">Add<i
                        class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>

@push('child-scripts')
<script>
    $(function() {
            flatpickr('#validity', {
            mode: "range",
            disable: [
            {
                from: "0001-01-01",
                to: "{{$carbonDate}}"
            }
            ],
            onReady: function() {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                window.addEventListener('clearDates', event => {flatPickrInstance.clear()});
            }
        });
    });
</script>
@endpush
