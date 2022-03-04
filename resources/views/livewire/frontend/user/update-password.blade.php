<div class="card-body">
    <form method="POST" wire:submit.prevent='changePassword'>
        @csrf
        <div class="form-group col-md-12">
            <label> {{__('Current Password')}} <span class="required">*</span></label>
            <input class="form-control {{$errors->has('current_password')?'is-invalid':''}}" name="current_password"
                type="password" wire:model.defer='user.current_password' />
            <x-defaults.input-error for="current_password" />
        </div>
        <div class="form-group col-md-12">
            <label> {{__('New Password')}} <span class="required">*</span></label>
            <input wire:model.defer='user.password' class="form-control {{$errors->has('password')?'is-invalid':''}}"
                name="password" type="password" />
            <x-defaults.input-error for="password" />
        </div>
        <div class="form-group col-md-12">
            <label> {{__('Confirm Password')}} <span class="required">*</span></label>
            <input wire:model.defer='user.password_confirmation' class="form-control" name="password_confirmation"
                type="password" />
        </div>
        <div class="col-md-12">
            <button type="submit" wire:loading.attr='disable' class="btn btn-fill-out submit font-weight-bold">
                {{__('Save
                Change')}} </button>
        </div>
    </form>
</div>
