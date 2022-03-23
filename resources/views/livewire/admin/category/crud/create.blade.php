<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
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
                <label class="text-capitalize form-label mt-0" for="catIcon">custom icon</label>
                <input type="file" wire:model.defer='icon' id="catIcon" name="icon" class="form-control" />
                <x-defaults.input-error for="icon" />
            </div>
            <div class="form-group">
                <label class="text-capitalize form-label mt-0 mb-3" for="selectDefault">Choose Default Icon Instead of
                    Custom
                    Icon</label>
                <x-admin.category.default-icon />
                <x-defaults.input-error for="default_icon" />
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-list">
                <button class="btn btn-success float-sm-end" type="submit">Add<i class="fa fa-plus ms-1"></i></button>
            </div>
        </div>
    </form>
</div>

@push('child-scripts')
<script>
    //category icon only checked one is allowed
$(function() {

$('.check-one').on('click',function() {
    $('.check-one').not(this).prop('checked', false);
    });

});

</script>
{{-- <script>
    //insert checked icon to input value
$(function() {
$('.check-one').each(function() {
    $(this).on('change', function() {

        let val = $(this).val();
        if($(this).is(':checked')) {
            @this.default_icon = '';
            @this.default_icon = val;
        }else {
            @this.default_icon = '';
        }
    });
});
});
</script> --}}

@endpush
