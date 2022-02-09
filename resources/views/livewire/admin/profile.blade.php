<div class="row">

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Photo</div>
            </div>
            <div class="card-body">
                <form action="">

                    {{-- <div class="mb-4 mb-lg-0">
                        <input type="file" id="input-file-now-custom-1" class="dropify"
                            data-default-file="{{asset('backend/default-images/user.png')}}" data-bs-height="180" />
                    </div> --}}
                    <div class="main-chat-msg-name text-center mt-1">
                        <a href="profile.html">
                            <h5 clas s="mb-1 text-dark fw-semibold">
                                <span>first</span>
                                <span>second</span>
                            </h5>
                        </a>
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">role name</p>
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <a href="javascript:void(0)" class="btn btn-primary">Update</a>
            </div>
        </div>

    </div>
    <div class="col-xl-8">
        <div class="card">
            {!! Form::open(["wire:submit.prevent='update'", 'id'=>'UpdateAdmin']) !!}
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name') !!}
                            {!! Form::text('first_name', null, ['class'=>($errors->has('first_name')?'form-control
                            is-invalid':'form-control'),'placeholder'=>'First Name', "wire:model='first_name'"])
                            !!}
                            <x-defaults.input-error for="first_name" />
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {!! Form::label('second_name', 'Second Name') !!}
                            {!! Form::text('second_name', null, ['class'=>($errors->has('second_name')?'form-control
                            is-invalid':'form-control'), 'placeholder'=>'Second Name',
                            "wire:model='second_name'"])
                            !!}
                            <x-defaults.input-error for="second_name" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class'=>($errors->has('email')?'form-control
                    is-invalid':'form-control'), 'placeholder'=>'Email', "wire:model='email'"]) !!}
                    <x-defaults.input-error for="email" />
                </div>
                <div class="form-group">
                    {!! Form::label('phone_number', 'Phone Number') !!}
                    {!! Form::text('phone_number', null, ['class'=>($errors->has('phone_number')?'form-control
                    is-invalid':'form-control'), 'placeholder'=>'Phone Number', "wire:model='phone_number'"])
                    !!}
                    <x-defaults.input-error for="phone_number" />
                </div>
                {{-- @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <livewire:admin.profile.update-password-form />

                <x-jet-section-border />
                @endif --}}
                <div class="form-group">
                    {!! Form::label('current_password', 'Current Password',['class'=>'form-label']) !!}
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                        </a>
                        {!! Form::password('current_password',['class'=>($errors->has('current_password')?'input100
                        form-control is-invalid':'input100 form-control'),
                        'placeholder'=>'Current Password'])
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
                        is-invalid':'input100 form-control'), 'placeholder'=>'New Password', "wire:model='password'"])
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
                        'placeholder'=>'Confirm Password'])
                        !!}
                        <x-defaults.input-error for="password_confirmation" />
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                {!! Form::submit('Save', ['class'=>'btn btn-success my-1']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Delete Account</div>
            </div>
            <div class="card-body">
                <p>Its Advisable for you to request your data to be sent to your Email.</p>
                <label class="custom-control custom-checkbox mb-0">
                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"
                        checked>
                    <span class="custom-control-label">Yes, Send my data to my Email.</span>
                </label>
            </div>
            <div class="card-footer text-end">
                <a href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
                <a href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
            </div>
        </div>
    </div>
</div>
