<div class="card">
    {!! Form::open(["wire:submit.prevent='changePassword'"]) !!}
    <div class="card-header fix-p">
        <div class="card-title">Edit Password</div>
    </div>

    <div class="card-body">
        <div class="form-group">
            {!! Form::label('current_password', 'Current Password',['class'=>'form-label']) !!}
            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                </a>
                {!! Form::password('current_password',['class'=>($errors->has('current_password')?'input100
                form-control is-invalid':'input100 form-control'),
                'placeholder'=>'Current Password',"wire:model.defer='current_password'"])
                !!}
                <x-defaults.input-error for="current_password" />
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'New Password',['class'=>'form-label']) !!}
            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                </a>
                {!! Form::password('password', ['class'=>($errors->has('password')?'input100 form-control
                is-invalid':'input100 form-control'), 'placeholder'=>'New Password',
                "wire:model.defer='password'"])
                !!}
                <x-defaults.input-error for="password" />
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password',['class'=>'form-label']) !!}
            <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                </a>
                {!! Form::password('password_confirmation', ['class'=>'input100 form-control',
                'placeholder'=>'Confirm Password', "wire:model.defer='password_confirmation'"])
                !!}

            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <x-loading-button btn="Update" class="btn btn-primary" icon="bi bi-box-arrow-in-up" />
    </div>
    {!! Form::close() !!}
</div>
