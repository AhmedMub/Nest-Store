{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemoDiscount8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit selected Discount</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update'>
                @csrf
                <input type="hidden" wire:model='discountId'>
                <div class="modal-body card-body py-2">
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="name">name</label>
                        <input wire:model.defer='name' id="name" name="name" type="text"
                            class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Discount Name"
                            required />
                        <x-defaults.input-error for="name" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="nameAr">discount percentage</label>
                        <input wire:model.defer='discount_percent' id="discount_percent" name="discount_percent"
                            type="text" class="form-control {{$errors->has('discount_percent')?'is-invalid':''}}"
                            placeholder="Category Arabic Name" required />
                        <x-defaults.input-error for="discount_percent" />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="selectedProductName">selected
                            product</label>
                        <input type="text" id="selectedProductName" class="selectedProductName form-control"
                            value="{{$selectedProductName}}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize form-label mt-0" for="selectProduct">change product</label>
                        <select id="selectProduct" autocomplete="off" class="form-select" wire:model.defer="product_id"
                            name="product_id" required>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name_en}}</option>
                            @endforeach
                        </select>
                        <x-defaults.input-error for="product_id" />
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

        $('#selectProduct').on('change', function() {

            var selected = $('#selectProduct option:selected').text();

            $('.selectedProductName').prop('value', selected);
        });
        });
</script>
@endpush
