{{-- MODAL EFFECTS --}}
<div wire:ignore.self class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="fw-bold modal-title text-capitalize">edit selected district</h5><button aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" wire:submit.prevent='update'>
                @csrf
                <div class="modal-body card-body py-2">
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
                            <label class="text-capitalize form-label mt-0" for="chooseCountryEdit">choose country<span
                                    class="text-red">*</span></label>
                            <select autocomplete="off" class="form-select" id="chooseCountryEdit">
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
    window.addEventListener('openEdit', event=> {
        $("#chooseCountryEdit").select2({
            dropdownParent: $("#modaldemo8"),
            width: '100%'
        });
        $('#chooseCountryEdit').on('change', function (e) {
                var data = $('#chooseCountryEdit').select2("val");
                @this.set('country', data);
            });
    });
    window.addEventListener('resetSelect', event => {
        var selected =  $('#chooseCountryEdit option:first').attr('selected','selected').val();
        //resetSelect evenet will set value to first option
        $('#chooseCountryEdit').val(selected).trigger('change');
    });
</script>
@endpush
