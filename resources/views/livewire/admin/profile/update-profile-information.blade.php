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
                    is-invalid':'form-control'),'placeholder'=>'First Name',
                    "wire:model.defer='first_name'","required"])
                    !!}
                    <x-defaults.input-error for="first_name" />
                </div>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    {!! Form::label('second_name', 'Second Name') !!}
                    {!! Form::text('second_name', null, ['class'=>($errors->has('second_name')?'form-control
                    is-invalid':'form-control'), 'placeholder'=>'Second Name',
                    "wire:model.defer='second_name'", "required"])
                    !!}
                    <x-defaults.input-error for="second_name" />
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>($errors->has('email')?'form-control
            is-invalid':'form-control'), 'placeholder'=>'Email', "wire:model.defer='email'","required"]) !!}
            <x-defaults.input-error for="email" />
        </div>
        <div class="form-group">
            {!! Form::label('phone_number', 'Phone Number') !!}
            {!! Form::text('phone_number', null, ['class'=>($errors->has('phone_number')?'form-control
            is-invalid':'form-control'), 'placeholder'=>'Phone Number', "wire:model.defer='phone_number'","required"])
            !!}
            <x-defaults.input-error for="phone_number" />
        </div>
    </div>
    <div class="card-footer text-end">
        <x-loading-button btn="Save" class="btn btn-success my-1" icon="bi bi-arrow-bar-up" />

    </div>
    {!! Form::close() !!}

</div>
