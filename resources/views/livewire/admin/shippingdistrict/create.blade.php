{{-- //TODO must add required for all inputs --}}
<div class="card">
    <form autocomplete="off" method="POST" wire:submit.prevent='create'>
        @csrf
        <div class="card-header">
            <div class="card-title text-capitalize">add new district</div>
        </div>
        <div class="card-body py-2">
            <div class="form-group">
                <label class="text-capitalize form-label mt-0" for="district">district name<span
                        class="text-red">*</span></label>
                <input wire:model.defer='district' id="district" type="text"
                    class="form-control {{$errors->has('district')?'is-invalid':''}}"
                    placeholder="Write district name" />
                <x-defaults.input-error for="district" />
            </div>
            <div class="form-group">
                <div wire:ignore>
                    <label class="text-capitalize form-label mt-0" for="chooseCountry">choose country<span
                            class="text-red">*</span></label>
                    <select autocomplete="off" class="form-select" id="chooseCountry">
                        <option selected>Select an option...</option>
                        @if (count($countries) > 0)
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <x-defaults.input-error for="country" />
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
    $(function() {
        $('#chooseCountry').select2();
        $('#chooseCountry').on('change', function (e) {
            var data = $('#chooseCountry').select2("val");
            @this.set('country', data);
        });
    });
    window.addEventListener('resetSelect', event => {
        var selected =  $('#chooseCountry option:first').attr('selected','selected').val();
        //resetSelect evenet will set value to first option
        $('#chooseCountry').val(selected).trigger('change');
    });
</script>
@endpush
