<div x-data="{checked: false}" class="card">
    <div class="card-header">
        <div class="card-title">Delete Account</div>
    </div>
    <div class="card-body">
        <div class="alert alert-danger">
            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24">
                    <path fill="#f07f8f"
                        d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z" />
                    <circle cx="12" cy="17" r="1" fill="#e62a45" />
                    <path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z" />
                </svg></span>
            <strong>Danger Zone</strong>
            <hr class="message-inner-separator">
            <p class="mb-3">Careful this is a danger zone, Account wil be hard deleted</p>
            <label for="checkbox" class="custom-control custom-checkbox mb-0">
                <input id="checkbox" x-model="checked" type="checkbox" class="custom-control-input" value="option1">
                <span class="custom-control-label">Yes, Delete my account.</span>
            </label>
        </div>
    </div>
    <div class="card-footer text-end">
        {!! Form::open(["wire:submit.prevent='delete'"]) !!}
        {!! Form::submit('Delete Account', ['class'=>'btn btn-danger my-1', "x-bind:disabled='!checked'"]) !!}
        {!! Form::close() !!}
    </div>
</div>
