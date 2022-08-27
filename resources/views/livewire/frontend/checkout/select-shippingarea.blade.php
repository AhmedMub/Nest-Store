<div class="row shipping_calculator">
    <div class="form-group col-lg-6">
        <div wire:ignore class="custom_select">
            <select class="form-control select-active-auth" name="selectCountry">
                <option value="">Select country...</option>
                @if (count($countries) > 0)
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <x-defaults.input-error for="selectCountry" />
    </div>
    <div class="form-group col-lg-6">
        <div class="custom_select">
            <div class="custom_select">
                <select class="form-control fix-height" name="selectDistrict">
                    <option style="background-color:red;color:#4e46e5;">Select district...</option>
                    @if (isset($districts))
                    @foreach ($districts as $district)
                    <option value="{{$district->id}}">
                        {{$district->district}}
                    </option>
                    @endforeach
                    @endif
                </select>
                <x-defaults.input-error for="selectDistrict" />
            </div>
        </div>
    </div>
</div>
@push('added-scripts')
<script>
    $(function() {
        $('.select-active-auth').select2({
            width: '100%'
        });
        $('.select-active-auth').on('change', function (e) {
            var data = $('.select-active-auth').select2("val");
            @this.set('country', data);
        });
    });
</script>
@endpush
