<div class="card-body">
    <form method="POST" wire:submit.prevent='update'>
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label> {{__('First Name')}} <span class="required">*</span></label>
                <input class="form-control {{$errors->has('first_name')?'is-invalid':''}}" name="first_name" type="text"
                    wire:model.defer='first_name' required />
                <x-defaults.input-error for="first_name" />
            </div>
            <div class="form-group col-md-6">
                <label> {{__('Second Name')}} <span class="required">*</span></label>
                <input class="form-control {{$errors->has('second_name')?'is-invalid':''}}" name="second_name"
                    wire:model.defer='second_name' required />
                <x-defaults.input-error for="second_name" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Address')}} <span class="required">*</span></label>
                <input class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" type="text"
                    wire:model.defer='address' required />
                <x-defaults.input-error for="address" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Additional Address')}} </label>
                <input class="form-control {{$errors->has('addressTwo')?'is-invalid':''}}" name="addressTwo" type="text"
                    wire:model.defer='addressTwo' />
                <x-defaults.input-error for="addressTwo" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Phone Number')}} <span class="required">*</span></label>
                <input class="form-control {{$errors->has('phone')?'is-invalid':''}}" name="phone" type="text"
                    wire:model.defer='phone' required />
                <x-defaults.input-error for="phone" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Email Address')}} <span class="required">*</span></label>
                <input class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" type="email"
                    wire:model.defer='email' required />
                <x-defaults.input-error for="email" />
            </div>
            <div class="col-md-12">
                <button wire:loading.attr='disabled' type="submit" class="btn btn-fill-out submit font-weight-bold">
                    {{__('Save
                    Change')}} </button>
            </div>
        </div>
    </form>
</div>
