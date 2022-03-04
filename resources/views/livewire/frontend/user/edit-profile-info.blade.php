<div class="card-body">
    <form wire:model.prevent='update'>
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label> {{__('First Name')}} <span class="required">*</span></label>
                <input class="form-control" name="name" type="text" />
            </div>
            <div class="form-group col-md-6">
                <label> {{__('Second Name')}} <span class="required">*</span></label>
                <input class="form-control" name="phone" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Address')}} <span class="required">*</span></label>
                <input class="form-control" name="dname" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Phone Number')}} <span class="required">*</span></label>
                <input class="form-control" name="dname" type="text" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Email Address')}} <span class="required">*</span></label>
                <input class="form-control" name="email" type="email" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Current Password')}} <span class="required">*</span></label>
                <input class="form-control" name="password" type="password" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('New Password')}} <span class="required">*</span></label>
                <input class="form-control" name="npassword" type="password" />
            </div>
            <div class="form-group col-md-12">
                <label> {{__('Confirm Password')}} <span class="required">*</span></label>
                <input class="form-control" name="cpassword" type="password" />
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-fill-out submit font-weight-bold">
                    {{__('Save
                    Change')}} </button>
            </div>
        </div>
    </form>
</div>
