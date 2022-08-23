<div wire:ignore.self class="panel-collapse collapse" id="updateDetails">
    <div class="panel-body">
        <div class="row">
            <h4 class="mb-30">Billing Details</h4>
            <form wire:submit.prevent="update" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="fname" placeholder="First name *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" name="lname" placeholder="Last name *">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="billing_address" placeholder="Address *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" name="billing_address2" placeholder="Address line2">
                    </div>
                </div>
                <div class="row shipping_calculator">
                    <div class="form-group col-lg-6">
                        <div wire:ignore class="custom_select">
                            <select class="form-control select-active-auth">
                                <option value="">Select an country...</option>
                                @if (count($shippingAreas) > 0)
                                @foreach ($shippingAreas as $area => $id)
                                <option value="{{$id}}">{{$area}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <div class="custom_select">
                            <select wire:model="districtId" class="form-control">
                                <option>Select an district...</option>
                                @if (count($collDistricts) > 0)
                                @foreach ($collDistricts as $district)
                                @foreach ($district as $dist)
                                <option value="{{$dist['id']}}">{{$dist['district']}}</option>
                                @endforeach
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="zipcode" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" name="phone" placeholder="Phone *">
                    </div>
                </div>
                <div class="form-group mb-30">
                    <textarea rows="5" placeholder="Additional information"></textarea>
                </div>
                <button type="submit" class="btn btn-fill-out btn-block">
                    {{__('frontend/checkout.Update Details')}}<i class="fa-solid fa-arrows-rotate ml-15"></i></button>
            </form>
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
